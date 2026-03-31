<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $category_id = $request->get('category_id');
        $categories = Category::withCount('books')->get();
        
        $query = Book::with('category');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $books = $query->get();
        $total_books = $books->count();

        return view('books.index', compact('books', 'categories', 'total_books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            // Hapus spasi biar gak error di browser
            $nama_file = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            
            // Pindah langsung ke public/img_buku
            $file->move(public_path('img_buku'), $nama_file);
            $data['cover'] = $nama_file;
        }

        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambah!');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            // Hapus foto lama biar gak nyampah
            if ($book->cover && File::exists(public_path('img_buku/' . $book->cover))) {
                File::delete(public_path('img_buku/' . $book->cover));
            }

            $file = $request->file('cover');
            $nama_file = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('img_buku'), $nama_file);
            $data['cover'] = $nama_file;
        }

        $book->update($data);
        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy(Book $book)
    {
        if ($book->cover && File::exists(public_path('img_buku/' . $book->cover))) {
            File::delete(public_path('img_buku/' . $book->cover));
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
    public function beranda()
{
    // Cukup panggil view-nya aja, gak usah kirim data apa-apa lagi
    return view('beranda');
}
}