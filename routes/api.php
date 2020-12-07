<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('books','Api\BookController@createBook');

Route::post('customerinsert1','Api\CustomerController@store_customer1');

Route::post('barangs', 'Api\BarangController@createBarang');
Route::post('barangIndex', 'Api\BarangController@index');
Route::get('barcode', 'Api\BarangController@barcode');
Route::put('barangUpdate', 'Api\BarangController@updateBarang');