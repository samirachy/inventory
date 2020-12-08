<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
/
*/

//--------AdminController-----//

Route::get('/', 'AdminController@admin');
Route::get('get-users', 'AdminController@get_cat');
Route::get('dashboard', 'AdminController@dashboard');
Route::get('category', 'AdminController@category');
Route::get('create_category', 'AdminController@create_category');
Route::get('update_category/{id}', 'AdminController@update_category');
Route::post('update_category', 'AdminController@update');
Route::post('save-category', 'AdminController@save');
Route::get('delete-category/{id}', 'AdminController@delete');


//----------BlogController----------//

Route::get('blog', 'BlogController@blog');
Route::get('create_blog', 'BlogController@create_blog');
Route::get('update_blog/{id}', 'BlogController@update_blog');
Route::post('update_blog', 'BlogController@update');
Route::post('save', 'BlogController@save');
Route::get('delete/{id}', 'BlogController@delete');








//--------IndexController-----//

Route::get('welcome', 'IndexController@welcome');
Route::get('index', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
