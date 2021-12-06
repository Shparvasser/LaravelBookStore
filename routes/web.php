<?php

use App\Http\Controllers\BlogController;
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

// Route::get('/', [BlogController::class, 'index']);
// Route::get('/category/{slug}', [BlogController::class, 'getPostsByCategory'])->name('getPostsByCategory');

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/singup', function () {
    return view('singup');
});
Route::get('/singin', function () {
    return view('singin');
});
