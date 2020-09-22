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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/','PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Route::resource('posts.comments','CommentsController');

Route::get('/','PostsController@index');

Route::bind('posts', function ($value,$route){
    return App\Post::whereSlug($value)->first();
});

Route::bind('comments', function ($value,$route){
    return App\Comment::whereSlug($value)->first();
});


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
