<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class Seeder_JualBuah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert user (admin, petani, pembeli)
        DB::table('user')->insert([
            [
                'name' => 'Admin Sistem',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password121'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petani Mangga',
                'email' => 'petman@gmail.com',
                'password' => Hash::make('password122'),
                'role' => 'petani',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pembeli Buah',
                'email' => 'pembeli@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'pembeli',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Ambil ID user
        $petaniId = DB::table('user')->where('role', 'petani')->value('id');
        $pembeliId = DB::table('user')->where('role', 'pembeli')->value('id');

        // Insert products
        DB::table('products')->insert([
            [
                'user_id' => $petaniId,
                'name' => 'Mangga Harum Manis',
                'description' => 'Mangga segar langsung dari kebun.',
                'harga' => 15000,
                'stok' => 50,
                'image' => 'mangga.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $petaniId,
                'name' => 'Jeruk Manis',
                'description' => 'Jeruk lokal manis dan segar.',
                'harga' => 12000,
                'stok' => 80,
                'image' => 'jeruk.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $petaniId,
                'name' => 'Apel Fuji',
                'description' => 'Apel fuji dari Malang yang renyah dan manis.',
                'harga' => 18000,
                'stok' => 60,
                'image' => 'apel.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $petaniId,
                'name' => 'Pisang Raja',
                'description' => 'Pisang raja matang siap santap.',
                'harga' => 10000,
                'stok' => 100,
                'image' => 'pisang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $petaniId,
                'name' => 'Pepaya California',
                'description' => 'Pepaya manis, kaya serat dan vitamin C.',
                'harga' => 13000,
                'stok' => 70,
                'image' => 'pepaya.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert order
        $productId = DB::table('products')->first()->id;

        DB::table('orders')->insert([
            'buyer_id' => $pembeliId,
            'product_id' => $productId,
            'status' => 'Menunggu',
            'total_price' => 15000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
