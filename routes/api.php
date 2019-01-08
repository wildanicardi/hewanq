<?php

use Illuminate\Http\Request;

Route::post('auth/register','AuthController@registerAdmin');
Route::post('auth/update/{id}','AuthController@updateAkun');
Route::post('auth/login','AuthController@login');
Route::post('penjual/register','UserController@createPenjual');
Route::post('dokter/register','UserController@createDokter');
Route::get('users','UserController@users');
Route::get('dokters','UserController@doctors');
Route::get('penjual','UserController@penjual');
Route::get('detailDokter/{id}','UserController@detailDokter');
Route::get('detailUser/{id}','UserController@detailUser');
Route::get('users/profile','UserController@profile')->middLeware('auth:api');

Route::get('articles','ArticleController@articles');
Route::get('articles/{id}','ArticleController@detailArticle');


Route::get('barangs/{id}','BarangController@barangs');// get data untuk tampilan awal android
Route::get('barang/{id}','BarangController@barangku');//get data detail barnag ketika di klik
Route::get('barangs','BarangController@indexBarang');

//new
Route::group(['namespace' => 'Api'], function(){
    //service
    Route::get('service', 'JasaController@service');// get data untuk tampilan awal android
    Route::get('service/{id}','JasaController@index');
    Route::post('updateService/{id}', 'JasaController@updateService');
    Route::get('editService/{id}', 'JasaController@editService');
    Route::post('buatService/{id}', 'JasaController@createService');
    Route::get('service/{id}/detail_service', 'JasaController@detailService');
    Route::delete('service/{id}', 'JasaController@destroy');
    
    //pet
    Route::get('pet', 'PetController@pet');// get data untuk tampilan awal android
    Route::get('hewan/{id}', 'PetController@petsDetail');//detail hewan dengan id 
    Route::get('pet/{id}','PetController@index');//detail hewan yg di miliki oleh user
    Route::post('updateHewan/{id}', 'PetController@updatePet');
    Route::get('editHewan/{id}', 'PetController@editPet');
    Route::post('buatHewan/{id}', 'PetController@createPet');
    
    Route::delete('hewan/{id}', 'PetController@destroy');

    //item
    Route::get('item', 'ItemController@item');// get data untuk tampilan awal android
    Route::get('produk/{id}', 'ItemController@items');
    Route::get('item/{id}','ItemController@index');
    Route::post('updateItem/{id}', 'ItemController@updateItem');
    Route::get('editItem/{id}', 'ItemController@editItem');
    Route::post('buatItem/{id}', 'ItemController@buatItem');
    Route::delete('item/{id}', 'ItemController@destroy');
});
//keranjang
    Route::get('tambahToKeranjang/{id}','BarangController@getAddToCart');
    // Route::post('buatkeranjang/{id}', 'KeranjangController@store');
    Route::get('cart','KeranjangController@getCart');
    Route::post('/add-to-cart', 'KeranjangController@addToCart');
    Route::get('/{user_id}/list', 'KeranjangController@listProductInCart');
