<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;
class lokasiController extends Controller
{
    //
    public function index(){
        $lokasi_toko = DB::table('lokasi_toko')->get();
		return view('modul3/kunjungan_toko',['lokasi_toko'=>$lokasi_toko]);
    }
    public function titikkunjungan(){
        return view('modul3/kunjunganketoko');
    }

    public function titikAwal(){
		return view('modul3/titikAwal');
    }

    public function store (Request $request){
        $id=(DB::table('lokasi_toko')->count('barcode'))+1;
          $barcode_id = "TK".str_pad($id,3,"0",STR_PAD_LEFT);
        DB::table('lokasi_toko')->insert([
          'barcode' => $barcode_id,
          'nama_toko' => $request->nama_toko,
          'latitude' => $request->latitude,
          'longitude' => $request->longitude,
          'accuracy' => $request->accuracy
        ]);
        return redirect('/location');
    }

    public  function cetak(){ 
        $lokasi =  db::table('lokasi_toko')->limit(40)->get(); 
        $no = 1; 
        $paper_width = 793.7007874; // 38 mm
            $paper_height = 623.62204724; // 18 mm
            $paper_size = array(0, 0, $paper_width, $paper_height);
        $pdf =  PDF::loadView  ('modul3/cetakBarcode',  compact('lokasi', 'no')); 
        $pdf->setPaper("f4"); 
        return $pdf->stream(); 
      }

      public function getNamaToko($id){
        $data = DB::table('lokasi_toko')->select("nama_toko", "latitude", "longitude", "accuracy")->where("barcode",$id)->get();
        return response()->json(['data'=>$data]);
    }
}
