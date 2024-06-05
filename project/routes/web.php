<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ConversationController;

Route::get('/signup', [UserController::class, 'registerPage'])->middleware('guest');
Route::post('/signup/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/signin', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin/auth', [UserController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/profile/{id}', [UserController::class, 'profilePage'])->middleware('auth');
Route::put('/profile/edit/{id}', [UserController::class, 'editProfile'])->middleware('auth');

Route::get('/', [MainController::class, 'index'])->middleware('auth');
Route::get('/books/{kategori}', [MainController::class, 'category'])->middleware('auth');

Route::get('/buku-saya/{id}', [BookController::class, 'myBook'])->middleware('auth');
Route::get('/tambah-buku', [BookController::class, 'index'])->middleware('auth');
Route::post('/tambah-buku/add/{id}', [BookController::class, 'createBook'])->middleware('auth');

Route::delete('/hapus-buku/{id}', [BookController::class, 'deleteBook'])->middleware('auth');
Route::put('/edit-buku/edit/{id}', [BookController::class, 'editBook'])->middleware('auth');
Route::get('/edit-buku/{id}', [BookController::class, 'editBookPage'])->middleware('auth');
Route::get('/selected-book/{id}', [BookController::class, 'selected'])->middleware('auth');
Route::get('/list-peminjaman/{id}', [PeminjamanController::class, 'index'])->middleware('auth');
Route::post('/pinjam/{id}', [PeminjamanController::class, 'borrow'])->middleware('auth');
Route::delete('/kembalikan/{id}/{book_id}', [PeminjamanController::class, 'getBack'])->middleware('auth');

Route::get('/chat/{receiver_id}', [ConversationController::class, 'index'])->middleware('auth');
Route::post('/send-message/{receiver_id}', [ConversationController::class, 'sendMessage'])->middleware('auth');

Route::get('/getAllBooks', [MainController::class, 'getAllBooks'])->middleware('auth');
Route::get('/search/{keyword}', [MainController::class, 'search'])->middleware('auth');
