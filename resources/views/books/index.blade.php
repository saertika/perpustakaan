@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Buku</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row"> 
        @forelse($books as $book)
            <div class="col-md-3 mb-4"> 
                <div class="card h-100 shadow-sm border-0"> 
                    {{-- PATH LANGSUNG KE IMG_BUKU --}}
                    <img src="{{ asset('img_buku/' . $book->cover) }}" 
                         class="card-img-top" 
                         alt="Cover" 
                         style="height: 300px; object-fit: cover; background: #eee;">
                    
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-truncate">{{ $book->judul }}</h5>
                        <p class="card-text text-muted mb-1">Oleh: {{ $book->penulis }}</p>
                        <div class="mb-2">
                            <span class="badge bg-info text-dark">Stok: {{ $book->stok }}</span>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-info btn-sm flex-fill">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex-fill">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm w-100" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada data buku.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection