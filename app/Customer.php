<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public $table = 'customer';
    protected $fillable = [
        'id_customer',
        'id_kelurahan',
        'nama',
        'alamat',
        'foto',
        'file_path'
    ];
}
