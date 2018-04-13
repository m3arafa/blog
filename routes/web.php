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
//    return view('/home');
//});

Route::get('/', 'PostsController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/contact', function () {
    return view('contact');
});

Route::resource('/post', 'PostsController');

Route::resource('/user', 'UsersController');

Route::resource('/post/comment', 'CommentsController');

Route::resource('/post/comment/replies', 'CommentRepliesController');

Route::resource('/category', 'CategoriesController');



Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/comments', 'AdminCommentsController');

    Route::resource('admin/replies', 'AdminCommentRepliesController');

});