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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ThemeController@index');
Route::get('/themes/{theme}','ThemeController@show');
Route::get('/themes/{theme}/posts/{post}','PostController@show');
Route::post('/themes','ThemeController@store');
Route::get('/themes/{theme}/edit','ThemeController@edit');
Route::put('/themes/{theme}','ThemeController@update');
Route::put('/themes/{theme}/posts/{post}','PostController@update');
Route::delete('/themes/{theme}','ThemeController@destroy');
Route::delete('/themes/{theme}/posts/{post}','PostController@destroy');
Route::post('/themes/{theme}/posts','PostController@store');
Route::get('/themes/{theme}/posts/{post}/edit','PostController@edit');


