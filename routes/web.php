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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('posts', 'PostController');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('contact', 'PagesController@getContact')->name('get.contact');
Route::post('contact', 'PagesController@postContact')->name('post.contact');
Route::get('blog/{post}', 'PagesController@getBlog')->name('get.blog');
Route::get('/', 'PagesController@getHome')->name('get.home');

Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage.users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
