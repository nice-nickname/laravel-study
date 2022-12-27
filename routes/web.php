<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Environment\Console;

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

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/about', [HomeController::class, "about"])->name('about');

Route::get('/login', [AuthController::class, "loginForm"])->name("login");
Route::post('/login', [AuthController::class, "login"])->name("api.login");
Route::post('/registration', [AuthController::class, "registration"])->name("api.registration");
Route::get('/logout', [AuthController::class, "logout"])->name("logout");

Route::get('/books', [BooksController::class, "books"])->name("books");
Route::get('/book', [BooksController::class, "book"])->name("book");

Route::middleware(['auth'])->group(function () {
    Route::post('/favorite', [BooksController::class, "mark_favorite"]);
    Route::post('/basket', [BooksController::class, "mark_basket"]);
    Route::post('/comments', [BooksController::class, "post_comment"])->name("post_comment");

    Route::get('/bucket', [HomeController::class, "bucket"])->name('bucket');
    Route::get('/account', [HomeController::class, "account"])->name('account');
});

