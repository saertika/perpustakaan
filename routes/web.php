<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

// Route untuk CRUD Buku dan Kategori
Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);