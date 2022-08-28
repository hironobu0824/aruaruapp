<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
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
//     return view('welcome']);
// });

Auth::routes();

<<<<<<< Updated upstream
Route::get('/home', 'HomeController@index')->name('home');
=======

// Route::get('/home', 'HomeController::class,'index')->name('home']);
>>>>>>> Stashed changes

Route::get('/',[ThemeController::class,'index']);
Route::get('/new',[ThemeController::class,'new']);
Route::get('/create',[ThemeController::class,'create']);
Route::get('/user/{user}',[UserController::class,'show']);
Route::get('/categories/{category}',[CategoryController::class,'index']);
Route::get('/themes/{theme}',[ThemeController::class,'show']);
Route::get('/themes/{theme}/posts/{post}',[PostController::class,'show']);
Route::get('/themes/{theme}/posts/{post}/comments/{comment}/edit',[CommentController::class,'edit']);
Route::put('/themes/{theme}/posts/{post}/comments/{comment}',[CommentController::class,'update']);
Route::delete('/themes/{theme}/posts/{post}/comments/{comment}',[CommentController::class,'destroy']);

Route::middleware('auth')->group(function () {
<<<<<<< Updated upstream
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
=======
    Route::get('/home', [HomeController::class,'index'])->name('home');
    Route::post('/themes',[ThemeController::class,'store']);
    Route::get('/themes/{theme}/edit',[ThemeController::class,'edit']);
    Route::put('/themes/{theme}',[ThemeController::class,'update']);
    Route::delete('/themes/{theme}',[ThemeController::class,'destroy']);
    Route::post('/themes/{theme}/posts',[PostController::class,'store']);
    Route::get('/themes/{theme}/posts/{post}/edit',[PostController::class,'edit']);
    Route::put('/themes/{theme}/posts/{post}',[PostController::class,'update']);
    Route::delete('/themes/{theme}/posts/{post}',[PostController::class,'destroy']);
    Route::get('/posts/like/{id}', [PostController::class,'like'])->name('post.like');
    Route::get('/posts/unlike/{id}', [PostController::class,'unlike'])->name('post.unlike');
    Route::post('/themes/{theme}/posts/{post}/comments',[CommentController::class,'store']);
>>>>>>> Stashed changes
 });