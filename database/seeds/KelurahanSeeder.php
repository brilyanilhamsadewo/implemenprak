<?php

// use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class KelurahanSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'kelurahan';
        $this->filename = base_path().'/database/seeds/csvs/kelurahan.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id_kelurahan',
            1 => 'id_kecamatan',
            2 => 'nama_kelurahan',
            3 => 'kodepos',
        ];
        $this->should_trim = true;
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
