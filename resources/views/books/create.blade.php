@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Koleksi Buku Baru</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Buku</label>
                            <input type="text" name="judul" class="form-control border-primary" placeholder="Contoh: Laskar Pelangi" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Penulis</label>
                                <input type="text" name="penulis" class="form-control border-primary" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" class="form-control border-primary" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <select name="category_id" class="form-select border-primary" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jumlah Stok</label>
                            <input type="number" name="stok" class="form-control border-primary" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-primary">Upload Cover Buku (Gambar)</label>
                            <input type="file" name="cover" class="form-control border-primary" accept="image/*" required>
                            <div class="form-text">Format: JPG, PNG, atau JPEG.</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary shadow">Simpan Buku</button>
                            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection