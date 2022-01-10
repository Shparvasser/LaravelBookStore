<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;

Route::middleware(['role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-panel');
    Route::get('/books', [AdminController::class, 'showBooks'])->name('admin-books');
    Route::get('/categories', [AdminController::class, 'showCategories'])->name('admin-categories');
    Route::get('/edit/{id}/book', [BookController::class, 'edit'])->name('book-edit');
    Route::get('/delete/{id}/book', [BookController::class, 'destroy'])->name('book-delete');
    Route::get('/edit/{id}/category', [CategoryController::class, 'edit'])->name('category-edit');
    Route::get('/delete/{id}/category', [CategoryController::class, 'destroy'])->name('category-delete');
    Route::post('/edit/{id}/book', [BookController::class, 'update'])->name('book-update');
    Route::post('/create/category', [CategoryController::class, 'create'])->name('category-create');
    Route::post('/edit/{id}/category', [CategoryController::class, 'update'])->name('category-update');
});
