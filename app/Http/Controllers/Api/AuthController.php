<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'address' => $validated['address'],
            'role' => 'pelanggan',
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::query()->where('email', $validated['email'])->first();
        if ($user && $user->role !== 'pelanggan') {
            return response()->json([
                'message' => 'Akun ini bukan pelanggan.',
            ], 403);
        }

        $token = auth('api')->attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'pelanggan',
        ]);

        if (! $token) {
            return response()->json([
                'message' => 'Email atau password salah.',
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me(): JsonResponse
    {
        if ($response = $this->ensurePelanggan()) {
            return $response;
        }

        return response()->json(auth('api')->user());
    }

    public function logout(): JsonResponse
    {
        if ($response = $this->ensurePelanggan()) {
            return $response;
        }

        auth('api')->logout();

        return response()->json([
            'message' => 'Logout berhasil.',
        ]);
    }

    public function refresh(): JsonResponse
    {
        if ($response = $this->ensurePelanggan()) {
            return $response;
        }

        return $this->respondWithToken(auth('api')->refresh());
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

    private function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user(),
        ]);
    }
}
