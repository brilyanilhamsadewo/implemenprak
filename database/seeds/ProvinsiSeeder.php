<?php

// use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class ProvinsiSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'provinsi';
        $this->filename = base_path().'/database/seeds/csvs/provinsi.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id_provinsi',
            1 => 'nama_provinsi',
        ];
        $this->should_trim = true;
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
