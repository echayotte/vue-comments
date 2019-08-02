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

Route::get('/', 'PageController@home');
Route::get('/page1', 'PageController@page1');
Route::get('/page2', 'PageController@page2');

Route::get('/comments/{url}', 'CommentsController@index');
Route::post('/comments', 'CommentsController@store');
Route::post('/comments/{id}', 'CommentsController@update');