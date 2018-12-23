<?php

use Illuminate\Http\Request;

Route::post('auth/register','AuthController@registerAdmin');
Route::post('auth/login','AuthController@login');
Route::post('penjual/register','UserController@createPenjual');
Route::get('users','UserController@users');
Route::get('dokters','UserController@doctors');
Route::get('penjual','UserController@penjual');
Route::get('users/profile','UserController@profile')->middLeware('auth:api');

// Route::get('articles','ArticleController@articles');
// Route::post('article/create','ArticleController@create');

Route::get('barangs','BarangController@barangs');
Route::post('barang/create','BarangController@store');
Route::delete('/barang/{id}', 'BarangController@destroy');

//new
Route::group(['namespace' => 'Api'], function(){
    //service
    Route::get('service', 'JasaController@service');
    Route::post('updateService/{id}', 'JasaController@updateService');
    Route::get('editService/{id}', 'JasaController@editCatering');
    Route::post('buatService/{id}', 'JasaController@createService');
    Route::get('service/{id}/detail_service', 'JasaController@detailService');
    Route::delete('service/{id}', 'JasaController@destroy');
    //pet
    Route::get('pet', 'PetController@pet');
    Route::post('updateHewan/{id}', 'PetController@updatePet');
    Route::get('editHewan/{id}', 'PetController@editPet');
    Route::post('buatHewan/{id}', 'PetController@createPet');
    //Route::get('service/{id}/detail_service', 'PetController@detailService');
    Route::delete('hewan/{id}', 'PetController@destroy');
    //item
    Route::get('item', 'ItemController@item');
    Route::post('updateItem/{id}', 'ItemController@updateItem');
    Route::get('editItem/{id}', 'ItemController@editItem');
    Route::post('buatItem/{id}', 'ItemController@buatItem');
    //Route::get('service/{id}/detail_service', 'ItemController@detailService');
    Route::delete('item/{id}', 'ItemController@destroy');
});
