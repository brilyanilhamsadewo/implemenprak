<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{

    public function run()
    {

        $nama_barang = array(
            "Susu Bayi", "Biskuit", "Sabun Mandi", "Sabun Cuci",
            "Pasta Gigi", "Sikat Gigi", "Gula Pasir", "Gula Batu",
            "Mentega", "Sapu Ijuk"
        );

        for($i = 0; $i < 10; $i++){
            $id_barang = date('ymd') . '0' . $i;

            DB::table('barang')->insert([
                'id_barang' => $id_barang,
                'nama' => $nama_barang[$i]
            ]);
        }

    }
}
