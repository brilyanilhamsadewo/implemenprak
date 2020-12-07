<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'id_barang','nama'
    ];
}
