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
//Frontend routes
Route::get('/', 'App\Http\Controllers\FrontEndController@homePage');
Route::get('/blog', 'App\Http\Controllers\FrontEndController@blogPage');
Route::get('/blog-single/{slug}', 'App\Http\Controllers\FrontEndController@blogSingle') -> name('blog.single');

Auth::routes();

//Frontend blog search route
Route::get('category/{slug}', 'App\Http\Controllers\FrontEndController@blogSearchByCategory') -> name('blog.search.category');
Route::post('search', 'App\Http\Controllers\FrontEndController@postSearch') -> name('post.search');


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

Route::get('post_edit/{edit_id}', 'App\Http\Controllers\PostController@edit');

Route::patch('post-update', 'App\Http\Controllers\PostController@updatePost') -> name('post.update.ajax');

Route::get('post-unpublished/{id}', 'App\Http\Controllers\PostController@unpublishedPost') -> name('post-unpublished');

Route::get('post-published/{id}', 'App\Http\Controllers\PostController@publishedPost') -> name('post-published');


// Settings routes
Route::get('setting-logo','App\Http\Controllers\settingController@settingIndex') -> name('logo.setting');
Route::put('logo-update','App\Http\Controllers\settingController@updateLogo') -> name('logo.update');

Route::get('setting-social','App\Http\Controllers\settingController@socialIndex') -> name('social.setting');
Route::put('social-update','App\Http\Controllers\settingController@updateSocial') -> name('social.update');

Route::get('setting-copyright','App\Http\Controllers\settingController@copyrightIndex') -> name('copyright.setting');
Route::put('copyright-update','App\Http\Controllers\settingController@updateCopyright') -> name('copyright.update');

//Backend homepage routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'home'], function(){

  //Clients routes
  Route::get('clients','HomeController@homeClients') -> name('clients.index');
  Route::put('update','HomeController@updateClients') -> name('clients.update');

  //Slides routes
  Route::get('sliders','HomeController@indexSlider') -> name('sliders.index');
  Route::post('sliders-store','HomeController@storeSlider') -> name('slider.store');

  //Who we are routes
  Route::get('we_are','HomeController@indexWe_are') -> name('we_are.index');
  Route::post('we_are-update','HomeController@updateWe_are') -> name('we_are.update');

  //Vision routes
  Route::get('vision','HomeController@indexVision') -> name('vision.index');
  Route::post('vision-update','HomeController@updateVision') -> name('vision.update');

  //Slides routes
  Route::get('testimonials','HomeController@indexTestimonials') -> name('testimonials.index');
  Route::post('testimonials-store','HomeController@storeTestimonials') -> name('testimonials.store');



});
