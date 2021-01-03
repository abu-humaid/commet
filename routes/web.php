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
    return view('welcome');
});

Auth::routes();

// Category Routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('post-category', 'App\Http\Controllers\CategoryController');

Route::get('post-category-edit/{id}', 'App\Http\Controllers\CategoryController@edit');

Route::post('post-category-update', 'App\Http\Controllers\CategoryController@update') -> name('category.update');

Route::get('post-category-unpublished/{id}', 'App\Http\Controllers\CategoryController@unpublishedCategory') -> name('category-unpublished');
Route::get('post-category-published/{id}', 'App\Http\Controllers\CategoryController@publishedCategory') -> name('category-published');

// Tag Routes
Route::resource('tag', 'App\Http\Controllers\TagController');

Route::get('tag-edit/{id}', 'App\Http\Controllers\TagController@edit');

Route::post('tag-update', 'App\Http\Controllers\TagController@update') -> name('tag.update');

Route::get('tag-unpublished/{id}', 'App\Http\Controllers\TagController@unpublishedTag') -> name('tag-unpublished');

Route::get('tag-published/{id}', 'App\Http\Controllers\TagController@publishedTag') -> name('tag-published');

// Post Routes
Route::resource('post','App\Http\Controllers\PostController');

Route::get('post-unpublished/{id}', 'App\Http\Controllers\PostController@unpublishedPost') -> name('post-unpublished');

Route::get('post-published/{id}', 'App\Http\Controllers\PostController@publishedPost') -> name('post-published');
