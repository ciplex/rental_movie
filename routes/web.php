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

Route::get('/admin', 'MoviesController@index');

Route::get('Customers/', 'MoviesController@customers');

Route::get('/admin/detail/{id}', ['uses' => 'MoviesController@detail', 'as' => 'movies.detail']);

Route::get('/admin/search', ['uses' => 'MoviesController@search', 'as' => 'movies.search']);

Route::get('/admin/create', ['uses' => 'MoviesController@create', 'as' => 'movies.create']);

Route::post('/admin/create', ['uses' => 'MoviesController@store', 'as' => 'movies.store']);

Route::delete('/admin/destroy/{id}', ['uses' => 'MoviesController@destroy', 'as' => 'movies.destroy']);

Route::get('/admin/edit/{id}', ['uses' => 'MoviesController@edit', 'as' => 'movies.edit']);

Route::put('/admin/update/{id}', ['uses' => 'MoviesController@update', 'as' => 'movies.update']);