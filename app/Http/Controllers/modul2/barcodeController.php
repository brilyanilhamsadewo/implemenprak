<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Barcode;

// use DB;

class barcodeController extends Controller
{
    public function barcode() {
        $barang = Barcode::get(); 
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        return view('modul2/barang')->with(compact('barang'));

    }   
    
    /*public function printBarcode(){ 
        $barang = Barcode::limit(12)->get(); 
        $pdf =  PDF::loadView ('/barcode/barcode_pdf',['barang'=>$barang]); 
        $pdf->setPaper('a4', 'potrait'); 
        return $pdf->stream('barcode/barcode_pdf'); 
    }*/

    public function scannerBarcode(){
        return view('modul2/barcode-scanner');
    }

    public function printBarcode(){ 
        $barang = Barcode::limit(40)->get(); 
        // $pdf =  PDF::loadView ('/barcode/barcodepdf',['barang'=>$barang]); 
        // $pdf->setPaper('a4', 'potrait');         
        $no = 1; 
        $paper_width = 793.7007874;
        $paper_height = 623.62204724;
        $paper_size = array(0, 0, $paper_width, $paper_height);
        $pdf =  PDF::loadView  ('/modul2/barcode_pdf',  compact('barang', 'no')); 
        $pdf->setPaper("f4"); 
        return $pdf->stream('modul2/barcode_pdf');
    }

}