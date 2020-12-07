<?php

namespace App\Http\Controllers\modul1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Redirect;
use Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB::table('customer')->get();
        $customer2 = $customer;
        return view('modul1/customer', compact([
            'customer',
            'customer2'
        ]));
    }

    public function tambah_customer1()
    {
        $provinsi = DB::table('provinsi')
                        ->get();
        return view('modul1/tambahcustomer1', compact('provinsi'));
    }

    public function tambah_customer2()
    {
        $provinsi = DB::table('provinsi')
                        ->get();
        return view('modul1/tambahcustomer2', compact('provinsi'));
    }

    public function req_data_kota()
    {
        $id_provinsi = $_POST['id'];
        $kota = DB::table('kota')
                    ->where('id_provinsi', $id_provinsi)
                    ->pluck('nama_kota', 'id_kota');

        return response()->json($kota);
    }

    public function req_data_kecamatan()
    {
        $id_kota = $_POST['id'];
        $kecamatan = DB::table('kecamatan')
                        ->where('id_kota', $id_kota)
                        ->pluck('nama_kecamatan', 'id_kecamatan');

        return response()->json($kecamatan);
    }

    public function req_data_kelurahan()
    {
        $id_kecamatan = $_POST['id'];
        $kelurahan = DB::table('kelurahan')
                        ->select("id_kelurahan", DB::raw("CONCAT(kodepos, ' - ',nama_kelurahan) as nama_kelurahan"))
                        ->where('ID_KECAMATAN', $id_kecamatan)
                        ->pluck("nama_kelurahan", "id_kelurahan");

        return response()->json($kelurahan);
    }

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

        return redirect('/customer');

        // dd($request);
    }

    public function store_customer2(Request $request)
    {
        // decode base64 ke png
        $foto = $request->input_foto;
        $foto = str_replace('data:image/png;base64,', '', $foto);
        $foto = str_replace(' ', '+', $foto);
        $foto_png = base64_decode($foto);

        // nama foto
        $nama_foto = 'foto_' . $request->input_nama . '.png';
        $nama_foto = str_replace(' ', '_', $nama_foto);

        // path foto
        $path_foto = '/storage/images/'.$nama_foto;

        // Simpan foto ke path
        File::put(base_path().'/public/storage/images/'.$nama_foto, $foto_png);

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
            'id_kelurahan' => $request->input_kelurahan,
            'nama' => $request->input_nama,
            'alamat' => $request->input_alamat,
            'file_path' => $path_foto
        ]);

        return redirect('/customer');
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_customer',$nama_file);
 
		// import data
		Excel::import(new CustomerImport, public_path('/file_customer/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Customer Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/customer');
    }
}
    
//     public function import_excel (Request $request) 
//     {
//         $this->validate($request, [
// 			'file_excel' => 'required|mimes:csv,xls,xlsx'
//         ]);
        
//         $file_excel = $request->file('file_excel');
//         $nama_file_excel = date('Y_m_d').'_'.$file_excel->getClientOriginalName();
//         $path_file_excel = '/file_cust/'.$nama_file_excel;

//         // Simpan file ke storage (public/storage/)
//         $file_excel->move('file_cust', $nama_file_excel);
        
//         $headings = (new HeadingRowImport)->toArray(public_path().$path_file_excel);

//         $headings = $headings[0][0];

//         if($headings[0] == "id_customer" && $headings[1] == "nama" && $headings[2] == "alamat" && $headings[3] == "id_kelurahan"){
//             $customer = Excel::toArray(new CustomerImport, public_path().$path_file_excel);
//             // $data_customer[] = Customer::select('*')->get();
//             $data = [];
//             $old = [];

//             for($i=0;$i<count($customer[0]);$i++){

//                 $customer[0][$i]['id_customer'] = trim($customer[0][$i]['id_customer'],"'");

//                 //mengecek apakah ada id customer di tabel customer. Jika tidak ada, data akan diinputkan.
//                 // if($data_customer[0][$i]['ID_CUSTOMER'] != $customer[0][$i]['id_customer']){
//                 if(!Customer::where('id_customer', $customer[0][$i]['id_customer'])->exists()){
//                     $data[] = [
//                         'id_customer' => $customer[0][$i]['id_customer'],
//                         'nama' => $customer[0][$i]['nama'],
//                         'alamat' => $customer[0][$i]['alamat'],
//                         'id_kelurahan' => $customer[0][$i]['id_kelurahan']
//                     ];
//                 }
//                 elseif(!Customer::where('nama', $customer[0][$i]['nama'])->exists()){
//                     $old = $customer[0][$i]['id_customer'];
//                 }
                    
//             }

//             if($old == null){
//                 Customer::insert($data);
//                 return redirect('/customer');
//             }else{
//                 return redirect('/customer')->with('alert', $old);
//             }

//             //menghapus file excel
//             Storage::disk('public')->delete($path_file_excel);
//         }
//         else{
//             //menghapus file excel
//             Storage::disk('public')->delete($path_file_excel);

//             return Redirect::back()->with('alert', 'Mohon upload file excel sesuai format.');
//         }
//     }
// }
