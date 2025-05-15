<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel (jika tidak mengikuti konvensi jamak Laravel)
    protected $table = 'products';

    // Field yang boleh diisi massal (mass assignment)
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'harga',
        'stok',
    ];

    // Relasi: Produk dimiliki oleh seorang petani (user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke orders (jika ada)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
