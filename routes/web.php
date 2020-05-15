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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/edit', 'HomeController@edit')->name('profile.edit');
Route::post('/profile/update', 'HomeController@update')->name('profile.update');

Route::get('/user_list', 'UserController@list')->name('list');
Route::get('/show/{id}', 'UserController@show')->name('show');

Route::get('/user_list/{id}/following', 'UserController@following')->name('users.following');
Route::get('/user_list/{id}/followers', 'UserController@followers')->name('users.followers');
Route::get('/user_list/{id}/follow','UserController@follow')->name('users.follow');
Route::get('/user_list/{id}/unfollow', 'UserController@unfollow')->name('users.unfollow');

Route::get('/admin/categories', 'AdminController@admin')->name('admin.categories');
Route::get('/admin/category_create', 'CategoryController@category_create')->name('admin.category_create');
Route::post('/admin/category_store', 'CategoryController@category_store')->name('admin.category_store');
Route::get('/admin/{id}/category_edit', 'CategoryController@category_edit')->name('admin.category_edit');
Route::post('/admin/{id}/category_update', 'CategoryController@category_update')->name('admin.category_update');
Route::get('/admin/{id}/questions', 'QuestionController@admin')->name('admin.questions');
Route::get('/admin/{id}/add_create', 'QuestionController@add_create')->name('admin.add_create');
Route::post('/admin/{id}/add_store', 'QuestionController@add_store')->name('admin.add_store');
