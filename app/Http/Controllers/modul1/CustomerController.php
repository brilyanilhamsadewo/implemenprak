<?php

namespace App\Http\Controllers\modul1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Imports\CustomerImport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

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
