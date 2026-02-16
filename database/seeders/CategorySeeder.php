<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
       Category::insert([
    ['nama_kategori' => 'Teknologi', 'deskripsi' => 'Buku tentang software dan hardware'],
    ['nama_kategori' => 'Sains', 'deskripsi' => 'Buku tentang ilmu alam'],
    ['nama_kategori' => 'Sastra', 'deskripsi' => 'Buku novel dan puisi'],

        ]);
    }
}