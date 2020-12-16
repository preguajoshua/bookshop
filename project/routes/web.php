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

Route::GET('/books',[BooksController::class, 'index']);
Route::GET('/books/create',[BooksController::class, 'create']);
Route::POST('/books/create',[BooksController::class, 'store']);
Route::GET('/books/{book}/edit',[BooksController::class, 'show']);
Route::PATCH('/books/{book}/edit',[BooksController::class, 'update']);
Route::DELETE('/books/{id}',[BooksController::class, 'delete']);


Route::GET('/authors',[AuthorsController::class, 'index']);
Route::GET('/authors/create',[AuthorsController::class, 'create']);
Route::POST('/authors/create',[AuthorsController::class, 'store']);
Route::GET('/authors/{author}/edit',[AuthorsController::class, 'show']);
Route::PATCH('/authors/{author}/edit',[AuthorsController::class, 'update']);
Route::DELETE('/authors/{author}',[AuthorsController::class, 'delete']);