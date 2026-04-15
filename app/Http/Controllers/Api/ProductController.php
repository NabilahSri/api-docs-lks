<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $user = auth('api')->user();
        if (! $user || $user->role !== 'pelanggan') {
            return response()->json([
                'message' => 'Akun ini bukan pelanggan.',
            ], 403);
        }

        $query = Product::query()->select([
            'id',
            'name',
            'price',
            'image_url',
            'rating',
            'stock',
            'created_at',
            'updated_at',
        ]);

        $query->orderBy('id');

        return response()->json($query->get());
    }

    public function show(Product $product): JsonResponse
    {
        $user = auth('api')->user();
        if (! $user || $user->role !== 'pelanggan') {
            return response()->json([
                'message' => 'Akun ini bukan pelanggan.',
            ], 403);
        }

        return response()->json($product);
    }
}
