<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
Route::get('/books/show', [BookController::class, 'show'])->name('books.show');
Route::get('/books/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/update', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/destroy', [BookController::class, 'destroy'])->name('books.destroy');
