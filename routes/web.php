<?php

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [RegistrationController::class, 'index'])->name('contact');

Route::post('/contact/submit', [RegistrationController::class, 'submit'])->name('contact-form');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/submit', [LoginController::class, 'login'])->name('login-form');

Route::get('/account', [RegistrationController::class, 'getUser'])->middleware('auth')->name('account');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/book', [BookController::class, 'index'])->name('book');
Route::post('/book/create', [BookController::class, 'create'])->name('book-create');

Route::get('/view/{slug}', [BookController::class, 'show'])->middleware('auth')->name('book-show');
Route::post('/view/{slug}/comment', [CommentController::class, 'commentOn'])->middleware('auth')->name('book-comment');
Route::post('/view/{slug}/rating', [RatingController::class, 'ratingOn'])->middleware('auth')->name('book-rating');

Route::get('/category/{id}', [BookController::class, 'getBookByCategory'])->name('getBookByCategory');

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
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
