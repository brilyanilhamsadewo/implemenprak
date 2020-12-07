<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'id_customer' => $row[0],
            'nama' => $row[1],
            'alamat' => $row[2],
            'id_kelurahan' => $row[3],
        ]);
    }
}
