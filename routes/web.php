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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



// Custom route
// Root URL redirect
Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard');
// Route::get('/posts', 'PagesController@posts')->name('posts');
Route::get('/show/{post}', 'PagesController@show')->name('show');
Route::get('/search', 'PagesController@search')->name('search');


Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');


Route::get('/fetches/district', 'FetchesController@district')->name('fetches.district');
Route::get('/fetches/city', 'FetchesController@city')->name('fetches.city');
Route::get('/fetches/partial', 'FetchesController@partial')->name('fetches.partial');
Route::get('/fetches/ward', 'FetchesController@ward')->name('fetches.ward');
Route::get('/fetches/validity', 'FetchesController@validity')->name('fetches.validity');
Route::get('/fetches/status', 'FetchesController@status')->name('fetches.status');


Route::get('/master', 'MastersController@index')->name('master');
Route::get('/master/users', 'MastersController@users')->name('master.users');
Route::get('/master/users/upgrade', 'MastersController@upgrade')->name('master.users.upgrade');
Route::get('/master/posts/list', 'MastersController@list')->name('master.posts.list');
Route::get('/master/posts/expired', 'MastersController@expired')->name('master.posts.expired');
Route::get('/master/posts/{post}', 'MastersController@show')->name('master.posts.show');
Route::get('/master/posts/{post}/update', 'MastersController@update')->name('master.posts.update');
