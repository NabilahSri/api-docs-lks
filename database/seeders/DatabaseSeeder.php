<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Pelanggan 1',
            'address' => 'Jl. Pelanggan 1',
            'role' => 'pelanggan',
            'email' => 'pelanggan1@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::factory()->create([
            'name' => 'Admin 1',
            'address' => 'Jl. Admin 1',
            'role' => 'admin',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password123'),
        ]);

        DB::table('products')->insert([
            [
                'name' => 'Fanta Orange',
                'price' => 7000,
                'image_url' => null,
                'rating' => 4.8,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fanta Strawberry',
                'price' => 7000,
                'image_url' => null,
                'rating' => 4.8,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oreo',
                'price' => 2000,
                'image_url' => null,
                'rating' => 4.8,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coca-Cola',
                'price' => 7000,
                'image_url' => null,
                'rating' => 4.8,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
