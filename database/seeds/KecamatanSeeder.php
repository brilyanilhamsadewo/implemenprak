<?php

// use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class KecamatanSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'kecamatan';
        $this->filename = base_path().'/database/seeds/csvs/kecamatan.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id_kecamatan',
            1 => 'id_kota',
            2 => 'nama_kecamatan',
        ];
        $this->should_trim = true;
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
