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
    return view('dashboard.index');
});

//category
Route::get('/category', 'categoryController@index');
Route::get('/category/create', 'categoryController@create');
Route::post('/category', 'categoryController@store');
Route::get('/category/{id}/edit','categoryController@edit');
Route::patch('/category/{id}','categoryController@update');
Route::delete('/category/{id}','categoryController@destroy');
Route::get('/category/{id}','categoryController@show');

//post
Route::get('/post', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::post('/post', 'PostController@store');
Route::get('/post/{id}/edit','PostController@edit');
Route::patch('/post/{id}','PostController@update');
Route::delete('/post/{id}','PostController@destroy');
Route::get('/post/{id}','PostController@show');
