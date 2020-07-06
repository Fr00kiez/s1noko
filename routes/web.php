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


Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/favorites', 'HomeController@favorites')->name('favorites');

Route::get('/home', 'HomeController@home')->name('home');

//POSTINGAN

Route::resource('posts', 'PostController')->only(['show', 'store', 'update', 'destroy']);
Route::prefix('posts')->name('posts.')->group(function () {
    Route::post('/{post}/like', 'PostController@like')->name('like');
    Route::post('/{post}/unlike', 'PostController@unlike')->name('unlike');
    Route::post('/{post}/comment', 'PostController@comment')->name('comment');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('users', 'UserController');
    Route::resource('posts', 'PostController');
});
