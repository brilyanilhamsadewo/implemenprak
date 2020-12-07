<?php

use Illuminate\Support\Facades\Route;

Route::get('/cetak-label-tnj-108', 'modul2\BarangController@index');
Route::post('/cetak-label-tnj-108', 'modul2\BarangController@cetak_barcode');

Route::get('/barcode-scanner', 'modul2\BarcodeController@index');
Route::view('/test', 'modul2/test');