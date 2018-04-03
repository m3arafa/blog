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

Route::get('/', function () {
    return view('home-blog');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', function () {
    return view('post');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/admin/posts', function () {
    return view('admin.posts');
});
Route::get('/admin/comments', function () {
    return view('admin.comments');
});
Route::get('/admin/users', function () {
    return view('admin.users');
});