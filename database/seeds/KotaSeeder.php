<?php

// use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class KotaSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'kota';
        $this->filename = base_path().'/database/seeds/csvs/kota.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id_kota',
            1 => 'id_provinsi',
            2 => 'nama_kota',
        ];
        $this->should_trim = true;
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
