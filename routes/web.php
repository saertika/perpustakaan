<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController; 

Route::get('/', [AuthController::class, 'showLogin'])->name('login'); 

// Proses Login (Kirim Data) - Ini yang cuma support POST
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    

    Route::get('/home', function () {
        return view('beranda'); 
    })->name('beranda');

    // Resource untuk Buku dan Kategori
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class); 
});