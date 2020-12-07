<?php

namespace App\Http\Controllers\Api;

use App\barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barcode;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    //
    // public function index() {
    //     $barang = barang::all();
    //     return response()->json([
    //         "message" => "tampil data barang"
    //     ],301);
    // }

    public function barcode() {
        $barang = Barcode::get(); 
        return response()->json([
            "message" => "tampil data barang"
        ],302);

    }   

    public function createBarang(Request $request){
        $barang = new barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama;
        $barang->save();

        return response()->json([
            "message" => "barang record created"
        ],301);
    }

    public function updateBarang(Request $request) {
        $old_name = DB::table('barang')->where('id_barang', $request->id)->value('nama');
        $new_name = $request->nama;

        DB::table('barang')->where('id_barang', $request->id)->update(['nama' => $request->nama]);

        $message = 'Data barang berhasil update ('.$old_name.'=>'.$new_name.')';

        return response()->json($message,301);
    }
}
