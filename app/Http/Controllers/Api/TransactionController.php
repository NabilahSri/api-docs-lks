<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index(): JsonResponse
    {
        if ($response = $this->ensurePelanggan()) {
            return $response;
        }

        $user = auth('api')->user();

        $transactions = Transaction::query()
            ->where('user_id', $user->id)
            ->orderByDesc('id')
            ->get([
                'id',
                'invoice_number',
                'transaction_date',
                'total_amount',
                'created_at',
            ]);

        return response()->json($transactions);
    }

    public function store(Request $request): JsonResponse
    {
        if ($response = $this->ensurePelanggan()) {
            return $response;
        }

        $validated = $request->validate([
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'integer', 'exists:products,id'],
            'items.*.qty' => ['required', 'integer', 'min:1'],
        ]);

        $items = $validated['items'];
        $productIds = collect($items)->pluck('product_id')->unique()->values()->all();
        $qtyByProductId = collect($items)->groupBy('product_id')->map(fn ($rows) => (int) collect($rows)->sum('qty'));

        $user = auth('api')->user();

        $transaction = DB::transaction(function () use ($user, $productIds, $qtyByProductId) {
            $products = Product::query()
                ->whereIn('id', $productIds)
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            foreach ($qtyByProductId as $productId => $qty) {
                $product = $products->get((int) $productId);
                if (! $product) {
                    return response()->json([
                        'message' => 'Produk tidak ditemukan.',
                        'product_id' => (int) $productId,
                    ], 422);
                }

                if ($product->stock < $qty) {
                    return response()->json([
                        'message' => 'Stok tidak cukup.',
                        'product_id' => (int) $productId,
                        'available_stock' => (int) $product->stock,
                        'requested_qty' => (int) $qty,
                    ], 422);
                }
            }

            $date = now()->toDateString();
            do {
                $invoiceNumber = 'INV-'.$date.'-'.Str::upper(Str::random(6));
            } while (Transaction::query()->where('invoice_number', $invoiceNumber)->exists());

            $transaction = Transaction::create([
                'user_id' => $user->id,
                'invoice_number' => $invoiceNumber,
                'transaction_date' => $date,
                'total_amount' => 0,
            ]);

            $totalAmount = 0;

            foreach ($qtyByProductId as $productId => $qty) {
                $product = $products->get((int) $productId);
                $unitPrice = (int) $product->price;
                $lineTotal = $unitPrice * (int) $qty;

                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'unit_price' => $unitPrice,
                    'quantity' => (int) $qty,
                    'line_total' => $lineTotal,
                ]);

                $product->decrement('stock', (int) $qty);
                $totalAmount += $lineTotal;
            }

            $transaction->update([
                'total_amount' => $totalAmount,
            ]);

            return $transaction;
        });

        if ($transaction instanceof JsonResponse) {
            return $transaction;
        }

        return $this->show($transaction);
    }

    public function show(Transaction $transaction): JsonResponse
    {
        if ($response = $this->ensurePelanggan()) {
            return $response;
        }

        $user = auth('api')->user();
        if ((int) $transaction->user_id !== (int) $user->id) {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
            ], 404);
        }

        $transaction->load(['items' => function ($query) {
            $query->orderBy('id');
        }]);

        return response()->json([
            'id' => $transaction->id,
            'invoice_number' => $transaction->invoice_number,
            'date' => optional($transaction->transaction_date)->format('Y-m-d'),
            'items' => $transaction->items->map(fn (TransactionItem $item) => [
                'product_id' => $item->product_id,
                'name' => $item->product_name,
                'unit_price' => $item->unit_price,
                'qty' => $item->quantity,
                'total' => $item->line_total,
            ])->values(),
            'total_amount' => $transaction->total_amount,
        ]);
    }

    private function ensurePelanggan(): ?JsonResponse
    {
        $user = auth('api')->user();

        if (! $user || $user->role !== 'pelanggan') {
            return response()->json([
                'message' => 'Akun ini bukan pelanggan.',
            ], 403);
        }

        return null;
    }
}
