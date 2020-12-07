<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function store_customer1(Request $request)
    {
        $jumlah_customer = DB::table('customer')->count();
        $jumlah_customer = $jumlah_customer + 1;

        if( 0 <= $jumlah_customer && $jumlah_customer <= 9 ){
            $id_customer = "CUS0000" . $jumlah_customer;
        } elseif ( 10 <= $jumlah_customer && $jumlah_customer <= 99 ) {
            $id_customer = "CUS000" . $jumlah_customer;
        } elseif ( 100 <= $jumlah_customer && $jumlah_customer <= 999 ) {
            $id_customer = "CUS00" . $jumlah_customer;
        } elseif ( 1000 <= $jumlah_customer && $jumlah_customer <= 9999 ) {
            $id_customer = "CUS0" . $jumlah_customer;
        } elseif ( 10000 <= $jumlah_customer && $jumlah_customer <= 99999 ) {
            $id_customer = "CUS" . $jumlah_customer;
        }

        DB::table('customer')->insert([
            'id_customer' => $id_customer,
            'id_kelurahan' => $request->kelurahan,
            'nama' => $request->input_nama,
            'alamat' => $request->input_alamat,
            'foto' => $request->input_foto
        ]);

        return response()->json([
            "message" => "Customer record created"
        ], 202);

        // dd($request);
    }
}
