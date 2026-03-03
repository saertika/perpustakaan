<?php

namespace App\Http\Controllers;

// WAJIB: Tambahkan baris ini agar Category bisa dikenali
use App\Models\Category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Sekarang Category sudah bisa dipanggil tanpa error
        $categories = Category::withCount('books')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
            'deskripsi' => 'nullable'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambah!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
            'deskripsi' => 'nullable'
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}