@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Kategori</h3>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->nama_kategori }}</td>
                <td>{{ $cat->deskripsi }}</td>
                <td>{{ $cat->books_count }}</td>
                <td>
                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-primary btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection