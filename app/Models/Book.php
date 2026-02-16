<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Kode memilah kolom yang dapat diisi datanya
    protected $fillable = [
        'category_id',
        'judul',
        'penulis',
        'tahun_terbit',
        'stok'
    ];

    // Kode relasi: Buku dimiliki oleh satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}