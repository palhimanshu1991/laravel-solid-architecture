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

Route::get('/home', 'HomeController@index');

/**
 * Books
 */
Route::get('books', 'BookController@index');
Route::get('books/create', 'BookController@create');
Route::post('books', 'BookController@store');
Route::get('books/{book}', 'BookController@show');
Route::get('books/{book}/edit', 'BookController@edit');
Route::put('books/{book}', 'BookController@update');
Route::delete('books/{book}', 'BookController@destroy');


//Route::get('authors/{author}/edit', 'AuthorController@edit');

 Route::resource('authors','AuthorController');
Route::resource('reviews','ReviewController');
Route::resource('users','UserController');
