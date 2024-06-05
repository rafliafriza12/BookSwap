<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ConversationController;

Route::get('/signup', [UserController::class, 'registerPage']);
Route::post('/signup/register', [UserController::class, 'register']);

Route::get('/signin', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin/auth', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/profile/{id}', [UserController::class, 'profilePage']);
Route::put('/profile/edit/{id}', [UserController::class, 'editProfile']);

Route::get('/', [MainController::class, 'index'])->middleware('auth');
Route::get('/books/{kategori}', [MainController::class, 'category'])->middleware('auth');

Route::get('/buku-saya/{id}', [BookController::class, 'myBook']);
Route::get('/tambah-buku', [BookController::class, 'index']);
Route::post('/tambah-buku/add/{id}', [BookController::class, 'createBook']);

Route::delete('/hapus-buku/{id}', [BookController::class, 'deleteBook']);
Route::put('/edit-buku/edit/{id}', [BookController::class, 'editBook']);
Route::get('/edit-buku/{id}', [BookController::class, 'editBookPage']);
Route::get('/selected-book/{id}', [BookController::class, 'selected']);
Route::get('/list-peminjaman/{id}', [PeminjamanController::class, 'index']);
Route::post('/pinjam/{id}', [PeminjamanController::class, 'borrow']);
Route::delete('/kembalikan/{id}/{book_id}', [PeminjamanController::class, 'getBack']);

Route::get('/chat/{receiver_id}', [ConversationController::class, 'index']);
Route::post('/send-message/{receiver_id}', [ConversationController::class, 'sendMessage']);

Route::get('/getAllBooks', [MainController::class, 'getAllBooks']);
Route::get('/search/{keyword}', [MainController::class, 'search']);
