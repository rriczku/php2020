<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;

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
    return view('welcome');
});

Route::resource('/comments', App\Http\Controllers\CommentController::class);
//Route::resource('/books', App\Http\Controllers\BooksController::class);

Route::resource('/books',App\Http\Controllers\BooksController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/books/create',[\App\Http\Controllers\BooksController::class,'store'])->middleware('auth');
Route::get('/books/create',[\App\Http\Controllers\BooksController::class,'create'])->middleware('auth');

require __DIR__.'/auth.php';
