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
Auth::routes();
Route::get('/admin/admin', 'HomeController@index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/admin/doctor','UserController@indexDokter');
Route::get('/admin/admin/doctor/form','UserController@formDokter')->name('doctors.form');
Route::get('/admin/admin/user/form','UserController@form')->name('user.form');
Route::post('/admin/admin/admin', 'UserController@createAkun')->name('user.list');
Route::delete('/admin/admin/user/{id}', 'UserController@destroyAkun');
Route::get('/admin/admin/user/{id}/edit', 'UserController@editAkun');
Route::put('/admin/admin/user/{id}', 'UserController@updateAkun');


Route::post('/admin/admin/service/list', 'ServiceController@store')->name('service.list');
Route::get('/admin/admin/service','ServiceController@index');
Route::get('/admin/admin/service/form','ServiceController@form')->name('service.form');
Route::delete('/admin/admin/service/{id}', 'ServiceController@destroy');
Route::get('/admin/admin/service/{id}/edit', 'ServiceController@edit');
Route::put('/admin/admin/service/{id}', 'ServiceController@update');



Route::get('/admin/admin/Pet','BarangController@indexPet');

Route::get('/admin/admin/item','BarangController@indexItems');
Route::delete('/admin/admin/item/{id}', 'BarangController@destroy');


Route::post('/admin/admin/article/list', 'ArticleController@store')->name('article.list');
Route::get('/admin/admin/article','ArticleController@index');
Route::get('/admin/admin/article/form','ArticleController@form')->name('article.form');
Route::get('/admin/admin/article/{id}/edit', 'ArticleController@edit');
Route::put('/admin/admin/article/{id}', 'ArticleController@update');
Route::delete('/admin/admin/article/{id}', 'ArticleController@destroy');




