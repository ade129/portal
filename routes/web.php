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
//     return view('frontend.masterpage');
// });

Route::get('/', 'Frontend\HomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// users
Route::get('/users', 'UsersController@index')->name('profile');

// quotes
Route::get('quotes', 'QuotesController@index')->name('index');
Route::get('/quotes/create-new', 'QuotesController@create_page')->name('create_page');
Route::post('/quotes/create-new', 'QuotesController@save_page')->name('save_page');
Route::get('/quotes/update/{quotes}', 'QuotesController@update_page')->name('edit');
Route::post('/quotes/update/{quotes}', 'QuotesController@update_save')->name('update');
Route::delete('/quotes/delete/{quote}', 'QuotesController@delete')->name('delete');
Route::get('/quotes/show/{slug}', 'QuotesController@show')->name('create');

// tags
Route::get('tags', 'TagsController@index')->name('index');
Route::get('tags/create-new', 'TagsController@create_page')->name('create_page');
Route::post('tags/create-new', 'TagsController@save_page')->name('save_page');
Route::get('/tags/update/{tags}', 'TagsController@update_page')->name('edit');
Route::post('/tags/update/{tags}', 'TagsController@update_save')->name('update');
