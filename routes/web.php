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


Route::get('/product', 'ProductController@list')->name('product');
Route::get('/new', 'ProductController@new')->name('new');
Route::post('/new', 'ProductController@insert');
Route::get('/delete/{id}', 'ProductController@delete')->name('delete');
Route::post('/delete/{id}', 'ProductController@destroy')->name('destroy');
Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
Route::post('/edit/{id}', 'ProductController@update');

//Route::get('/product/edit/{id}', ['as'=>'edit','uses'=>'ProductController@edit']);
//Route::post('/product/update/{id}', 'ProductController@update');