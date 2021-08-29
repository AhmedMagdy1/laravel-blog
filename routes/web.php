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

Route::get('/admin', function () {
    return view('admin.posts.post-form.create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin/posts')->group(function (){
    Route::get('/', 'Blog\PostController@index');
});

Route::prefix('admin/category')->group(function (){
    Route::get('/', 'Blog\CategoryController@index');
    Route::get('/create', 'Blog\CategoryController@create');
    Route::post('/create', 'Blog\CategoryController@store');
    Route::get('/{id}/edit', 'Blog\CategoryController@edit');
    Route::put('/{id}', 'Blog\CategoryController@update');
});
Route::prefix('/admin/keyword-group')->group(function (){
    Route::get('/', 'SEO\KeywordGroupController@index');
    Route::get('/create', 'SEO\KeywordGroupController@create');
    Route::post('/create', 'SEO\KeywordGroupController@store');
    Route::get('/{id}/edit', 'SEO\KeywordGroupController@edit');
    Route::put('/{id}', 'SEO\KeywordGroupController@update');
});
