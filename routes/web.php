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
    return view('welcome');
});

//Route::resource('rest', 'RestTestController')->names('restTest');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', 'PostController')->names('blog.posts');
});


Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog'], function () {

    // Blog Category

    $methods = ['index', 'edit', 'store', 'update', 'create',];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');

    // Blog Post

    $methods = ['index', 'edit', 'store', 'update', 'create',];
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');

});
