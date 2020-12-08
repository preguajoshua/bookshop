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
Route::POST('/books',[BooksController::class, 'store']);
Route::GET('/books/{id}',[BooksController::class, 'show']);
Route::PATCH('/books/{id}',[BooksController::class, 'update']);
Route::DELETE('/books/{id}',[BooksController::class, 'delete']);


Route::GET('/authors',[AuthorsController::class, 'index']);
Route::POST('/authors',[AuthorsController::class, 'store']);
Route::GET('/authors/{id}',[AuthorsController::class, 'show']);
Route::PATCH('/authors/{id}',[AuthorsController::class, 'update']);
Route::DELETE('/authors/{id}',[AuthorsController::class, 'delete']);

