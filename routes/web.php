<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    if (Auth::check()) {
        return redirect()->route('account');
    }
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('account');
    }
    return view('login');
})->name('login');
Route::post('/login/submit', [LoginController::class, 'login'])->name('login-form');

Route::get('/account', [ContactController::class, 'getUser'])->middleware('auth')->name('account');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Route::get('/account',[ContactController::class,'getUser'])->middleware('auth')
// Route::get('/contact/user', [ContactController::class, 'getUser'])->name('contact-user');
