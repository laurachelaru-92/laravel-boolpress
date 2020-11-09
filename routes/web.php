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
    return view('laura_home');
})->name('home');

Auth::routes();

Route::get('/posts', 'HomeController@index')->name('posts');
Route::get('/posts/show/{slug}', 'HomeController@show')->name('posts.show');

Route::prefix('admin')->name('admin/')->namespace('Admin')->middleware('auth')->group(function(){
    Route::resource('/posts', 'HomeController');
    // Route::get('/posts', 'HomeController@index')->name('posts');
    // Route::get('/posts/show/{slug}', 'HomeController@show')->name('posts/show');
    // Route::get('/posts/edit/{slug}', 'HomeController@edit')->name('posts/edit');
    // Route::get('/posts/edit/{slug}', 'HomeController@update')->name('posts/update');
    // Route::get('/posts/destroy/{id}', 'HomeController@destroy')->name('posts/destroy');
});