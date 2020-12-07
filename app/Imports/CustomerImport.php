<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;

class CustomerImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnError
{
    use Importable;

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }

    public function model(array $row)
    {
        return new Customer([
            'id_customer' => $row['id_customer'],
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'id_kelurahan' => $row['id_kelurahan'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            Rule::unique('customer','id_customer')
        ];
    }

    public function customValidationMessages()
    {
        return [
            'id_customer' => 'Import Gagal',
        ];
    }

    

    // public function sheets(): array
    // {
    //     return [
    //         new FirstSheetImport()
    //     ];
    // }
}
