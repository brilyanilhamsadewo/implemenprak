<?php

use Illuminate\Support\Facades\Route;

Route::get('/customer', 'modul1\CustomerController@index');
Route::get('/customer/tambah-1', 'modul1\CustomerController@tambah_customer1');
Route::get('/customer/tambah-2', 'modul1\CustomerController@tambah_customer2');

Route::post('/customer/req-data-kota', 'modul1\CustomerController@req_data_kota');
Route::post('/customer/req-data-kecamatan', 'modul1\CustomerController@req_data_kecamatan');
Route::post('/customer/req-data-kelurahan', 'modul1\CustomerController@req_data_kelurahan');

Route::post('/customer/tambah-1', 'modul1\CustomerController@store_customer1');
Route::post('/customer/tambah-2', 'modul1\CustomerController@store_customer2');