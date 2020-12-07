<?php

// namespace App\Http\Controllers\modul2;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;
// use PDF;
// use App\Barang;

// class BarangController extends Controller
// {
//     // public function index()
//     // {
//     //     $barang = DB::table('barang')->get();
//     //     $barang2 = $barang;
//     //     return view('modul2/barang', compact([
//     //         'barang'
//     //     ]));
//     // }

//     // public function cetak_barcode(Request $request)
//     // {
//     //     // dd($request);

//     //     // $id_barang = $request->input_id_barang;
//     //     // $nama_barang = DB::table('barang')->where('id_barang', $id_barang)->value('nama');

//     //     // $paper_width = 107.716535433; // pt -> 38 mm
//     //     // $paper_height = 51.023622047; // pt -> 18 mm
//     //     // $paper_size = array(0, 0, $paper_width, $paper_height);

//     //     // $pdf = PDF::loadView('modul2/label-tnj-108', compact(
//     //     //             'id_barang',
//     //     //             'nama_barang'
//     //     //         ));
        
//     //     // $pdf->setPaper($paper_size);

//     //     // return $pdf->stream();


//     //         // $barang =  barang::limit(40)->get(); 
//     //         // $n = 1; 
//     //         // $paper_width = 793.7007874; // 38 mm
//     //         // $paper_height = 623.62204724; // 18 mm
//     //         // $paper_size = array(0, 0, $paper_width, $paper_height);
//     //         // $pdf =  PDF::loadView('modul2/label-tnj-108', compact(
//     //         //                 'barang',
//     //         //                 'no'
//     //         //             ));
//     //         // $pdf->setPaper("f4"); 
//     //         // return $pdf->stream(); 
        
//     // }
// }


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;
// use PDF;
// use App\Barcode;

// // use DB;

// class BarangController extends Controller
// {
//     public function barcode() {
//         $barang = Barcode::get(); 
//         // $pdf = App::make('dompdf.wrapper');
//         // $pdf->loadHTML('<h1>Test</h1>');
//         // return $pdf->stream();
//         return view('barcode/barcode')->with(compact('barang'));

//     }   
    
//     /*public function printBarcode(){ 
//         $barang = Barcode::limit(12)->get(); 
//         $pdf =  PDF::loadView ('/barcode/barcode_pdf',['barang'=>$barang]); 
//         $pdf->setPaper('a4', 'potrait'); 
//         return $pdf->stream('barcode/barcode_pdf'); 
//     }*/

//     public function scannerBarcode(){
//         return view('barcode/barcode_scanner');
//     }

//     public function printBarcode(){ 
//         $barang = Barcode::limit(40)->get(); 
//         // $pdf =  PDF::loadView ('/barcode/barcodepdf',['barang'=>$barang]); 
//         // $pdf->setPaper('a4', 'potrait');         
//         $no = 1; 
//         $paper_width = 793.7007874;
//         $paper_height = 623.62204724;
//         $paper_size = array(0, 0, $paper_width, $paper_height);
//         $pdf =  PDF::loadView  ('/barcode/barcode_pdf',  compact('barang', 'no')); 
//         $pdf->setPaper("f4"); 
//         return $pdf->stream('barcode/barcode_pdf');
//     }

// }