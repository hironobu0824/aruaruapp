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

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','ThemeController@index');
Route::get('/new','ThemeController@new');
Route::get('/create','ThemeController@create');
Route::get('/user/{user}','UserController@show');
Route::get('/categories/{category}','CategoryController@index');
Route::get('/themes/{theme}','ThemeController@show');
Route::get('/themes/{theme}/posts/{post}','PostController@show');
Route::get('/themes/{theme}/posts/{post}/comments/{comment}/edit','CommentController@edit');
Route::put('/themes/{theme}/posts/{post}/comments/{comment}','CommentController@update');
Route::delete('/themes/{theme}/posts/{post}/comments/{comment}','CommentController@destroy');

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/themes','ThemeController@store');
    Route::get('/themes/{theme}/edit','ThemeController@edit');
    Route::put('/themes/{theme}','ThemeController@update');
    Route::delete('/themes/{theme}','ThemeController@destroy');
    Route::post('/themes/{theme}/posts','PostController@store');
    Route::get('/themes/{theme}/posts/{post}/edit','PostController@edit');
    Route::put('/themes/{theme}/posts/{post}','PostController@update');
    Route::delete('/themes/{theme}/posts/{post}','PostController@destroy');
    Route::get('/posts/like/{id}', 'PostController@like')->name('post.like');
    Route::get('/posts/unlike/{id}', 'PostController@unlike')->name('post.unlike');
    Route::post('/themes/{theme}/posts/{post}/comments','CommentController@store');
 });