<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'Home\HomeController@index');

/*
 * Books
 */
Route::get('books', 'Book\BookController@index');
Route::get('books/create', 'Book\BookController@create');
Route::post('books', 'Book\BookController@store');
Route::get('books/{book}', 'Book\BookController@show');
Route::get('books/{book}/edit', 'Book\BookController@edit');
Route::put('books/{book}', 'Book\BookController@update');
Route::delete('books/{book}', 'Book\BookController@destroy');

//Route::get('authors/{author}/edit', 'AuthorController@edit');

 Route::resource('authors', 'AuthorController');
Route::resource('reviews', 'ReviewController');
Route::resource('users', 'UserController');
