@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Data Buku: {{ $book->judul }}</h5>
                </div>
                <div class="card-body p-4">
                    
                    {{-- Bagian Error (Cukup Satu Saja) --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Buku</label>
                            <input type="text" name="judul" class="form-control border-primary" value="{{ old('judul', $book->judul) }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Penulis</label>
                                <input type="text" name="penulis" class="form-control border-primary" value="{{ old('penulis', $book->penulis) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" class="form-control border-primary" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <select name="category_id" class="form-select border-primary" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Stok</label>
                            <input type="number" name="stok" class="form-control border-primary" value="{{ old('stok', $book->stok) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-primary">Cover Saat Ini</label>
                            <div class="mb-2">
                                {{-- Pastikan path ini sesuai dengan folder public/img_buku --}}
                                <img src="{{ asset('img_buku/' . $book->cover) }}" alt="Current Cover" style="width: 100px; height: 140px; object-fit: cover; border: 2px solid #007bff; border-radius: 5px;">
                            </div>
                            
                            <label class="form-label fw-bold">Ganti Cover (Kosongkan jika tidak ingin ganti)</label>
                            <input type="file" name="cover" class="form-control border-primary" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, JPEG. Max: 2MB</small>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary shadow">Update Data Buku</button>
                            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection