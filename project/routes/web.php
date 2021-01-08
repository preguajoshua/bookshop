<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;

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

Route::GET('/books',[BooksController::class, 'index'])->name('books.index');
Route::GET('/books/create',[BooksController::class, 'create'])->name('books.create');
Route::POST('/books/create',[BooksController::class, 'store'])->name('books.store');
Route::GET('/books/{book}/edit',[BooksController::class, 'show'])->name('books.show');
Route::PATCH('/books/{book}/edit',[BooksController::class, 'update'])->name('books.update');
Route::DELETE('/books/{id}',[BooksController::class, 'delete'])->name('books.delete');


Route::GET('/authors',[AuthorsController::class, 'index'])->name('authors.index');
Route::GET('/authors/create',[AuthorsController::class, 'create'])->name('authors.create');
Route::POST('/authors/create',[AuthorsController::class, 'store'])->name('authors.store');
Route::GET('/authors/{author}/edit',[AuthorsController::class, 'show'])->name('authors.show');
Route::PATCH('/authors/{author}/edit',[AuthorsController::class, 'update'])->name('authors.update');
Route::DELETE('/authors/{author}',[AuthorsController::class, 'delete'])->name('authors.delete');

// Route::resource('authors', AuthorsController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
