<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegistrationController;

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
Route::get('/page/{page}', [HomeController::class, 'totalBooks'])->name('page');

Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::middleware('guest')->group(function () {
    Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
    Route::post('/registration/submit', [RegistrationController::class, 'submit'])->name('registration-form');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('login-form');
});


Route::get('/account', [RegistrationController::class, 'getUser'])->middleware('auth')->name('account');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/book', [BookController::class, 'index'])->name('book');
Route::post('/book/create', [BookController::class, 'create'])->name('book-create');

Route::middleware('auth')->group(function () {
    Route::get('/view/{slug}', [BookController::class, 'show'])->name('book-show');
    Route::post('/view/{slug}/comment', [CommentController::class, 'commentOn'])->name('book-comment');
    Route::post('/view/{slug}/rating', [RatingController::class, 'ratingOn'])->name('book-rating');
});

Route::get('/category/{id}', [BookController::class, 'getBookByCategory'])->name('getBookByCategory');
Route::get('/category/{id}/page/{page}', [BookController::class, 'totalBooksByCategory'])->name('pageCategory');
