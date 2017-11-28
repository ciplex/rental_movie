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
    return view('welcome');
});

Auth::routes();

Route::get('/movies', 'MoviesController@index');;

Route::get('/movies/search', ['uses' => 'MoviesController@search', 'as' => 'movie.search']);

Route::get('/movies/create', ['uses' => 'MoviesController@create', 'as' => 'movie.create']);

Route::post('/movies/create', ['uses' => 'MoviesController@store', 'as' => 'movie.store']);

Route::get('/movies/destroy/{id}', ['uses' => 'MoviesController@destroy', 'as' => 'movie.destroy']);

Route::get('/movies/edit/{id}', ['uses' => 'MoviesController@edit', 'as' => 'movie.edit']);

Route::put('/movies/update/{id}', ['uses' => 'MoviesController@update', 'as' => 'movie.update']);