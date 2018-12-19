<?php

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
    return redirect('index');
});

/*
* Navigation Bar
*/
Route::get('about', 'BookController@getAbout');
Route::get('/index', 'BookController@index');

Route::resource('books.chapters', 'ChapterController');
Route::resource('books', 'BookController');
Route::get('books/{books}/delete', 'BookController@delete');
Route::get('books/{books}/chapters/{chapters}/delete', 'ChapterController@delete');
Route::get('/books-search', 'BookController@search');

Auth::routes();