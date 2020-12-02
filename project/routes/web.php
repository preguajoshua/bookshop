<?php

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
    return view('welcome');
});


// Route::get('/books', function () {
//     return view('books.index');
// });
Route::get('/books', 'App\Http\Controllers\BooksController@index');
Route::post('/books', 'App\Http\Controllers\BooksController@store');
Route::get('/books/{id}', 'App\Http\Controllers\BooksController@show');
Route::PATCH('/books/{id}', 'App\Http\Controllers\BooksController@update');
Route::GET('/booksdel/{id}', 'App\Http\Controllers\BooksController@delete');

Route::GET('/authors', 'App\Http\Controllers\AuthorsController@index');
Route::post('/authors', 'App\Http\Controllers\AuthorsController@store');
Route::GET('/authors/{id}', 'App\Http\Controllers\AuthorsController@show');
Route::PATCH('/authors/{id}', 'App\Http\Controllers\AuthorsController@update');
Route::GET('/authorsdel/{id}', 'App\Http\Controllers\AuthorsController@delete');


// Route::get('/authors', function () {
//     return view('authors.index');
// });
