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
Route::post('/themes','ThemeController@store');
Route::get('/themes/{theme}/edit','ThemeController@edit');
Route::put('/themes/{theme}','ThemeController@update');
Route::delete('/themes/{theme}','ThemeController@destroy');

