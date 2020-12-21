<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/customer');
Route::get('/login','Front\FrontController@index')->name('login');

Route::get('/modul2/barcode', 'barcodeController@barcode');
Route::get('/modul2/barcode_pdf', 'barcodeController@printbarcode');
Route::get('/modul2/barcode_scanner', 'barcodeController@scannerbarcode');

// Route::get('/modul3/lokasi_toko', 'lokasiController@index');
// Route::get('/modul3/kunjunganketoko', 'lokasiController@indexkunjungan');

Route::get('/location',  'lokasiController@index');
Route::get('/titikAwal',  'lokasiController@titikAwal');
Route::get('/titikKunjungan',  'lokasiController@titikKunjungan');
Route::post('/LocationStore', 'lokasiController@store');
Route::get('CetakBarcodeLokasi', 'lokasiController@cetak');
Route::get('Toko/req-nama-toko/{id}','lokasiController@getNamaToko');

Route::get('signin','AdminController@signin');