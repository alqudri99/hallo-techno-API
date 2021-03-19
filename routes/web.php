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
    return redirect('login');
});


Route::resource('product', 'ProductController');

Route::resource('category', 'CategoryController');

Route::get('hapus', 'ProductController@hapus');

Route::post('import', 'ProductController@fileImport');

Route::get('export', 'ProductController@fileExport');

Route::get('importing', 'ProductController@ImportView');

Route::resource('office', 'OfficeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('password', 'UserController');

