<?php

use Illuminate\Http\Request;

Route::post('auth/register','AuthController@registerAdmin');
Route::post('auth/login','AuthController@login');
Route::post('penjual/register','UserController@createPenjual');
Route::post('dokter/register','UserController@createDokter');
Route::get('users','UserController@users');
Route::get('dokters','UserController@doctors');
Route::get('penjual','UserController@penjual');
Route::get('users/profile','UserController@profile')->middLeware('auth:api');

Route::get('articles','ArticleController@articles');


Route::get('barangs/{id}','BarangController@barangs');// get data untuk tampilan awal android
Route::get('barang/{id}','BarangController@barangku');//get data detail barnag ketika di klik

//new
Route::group(['namespace' => 'Api'], function(){
    //service
    Route::get('service', 'JasaController@service');// get data untuk tampilan awal android
    Route::get('service/{id}','JasaController@index');
    Route::post('updateService/{id}', 'JasaController@updateService');
    Route::get('editService/{id}', 'JasaController@editCatering');
    Route::post('buatService/{id}', 'JasaController@createService');
    Route::get('service/{id}/detail_service', 'JasaController@detailService');
    Route::delete('service/{id}', 'JasaController@destroy');
    
    //pet
    Route::get('pet', 'PetController@pet');// get data untuk tampilan awal android
    Route::get('pet/{id}','PetController@index');
    Route::post('updateHewan/{id}', 'PetController@updatePet');
    Route::get('editHewan/{id}', 'PetController@editPet');
    Route::post('buatHewan/{id}', 'PetController@createPet');
    //Route::get('service/{id}/detail_service', 'PetController@detailService');
    Route::delete('hewan/{id}', 'PetController@destroy');

    //item
    Route::get('item', 'ItemController@item');// get data untuk tampilan awal android
    Route::get('item/{id}','ItemController@index');
    Route::post('updateItem/{id}', 'ItemController@updateItem');
    Route::get('editItem/{id}', 'ItemController@editItem');
    Route::post('buatItem/{id}', 'ItemController@buatItem');
    //Route::get('service/{id}/detail_service', 'ItemController@detailService');
    Route::delete('item/{id}', 'ItemController@destroy');
});
//keranjang
    Route::get('keranjang','KeranjangController@index');
    Route::get('tambahToKeranjang/{id}','BarangController@getAddToCart');
    // Route::post('buatkeranjang/{id}', 'KeranjangController@store');
    Route::get('cart','KeranjangController@getCart');
