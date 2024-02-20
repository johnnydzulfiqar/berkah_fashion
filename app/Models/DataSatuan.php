<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSatuan extends Model
{
    use HasFactory;
    protected $table = 'data_satuans';
    protected $primaryKey = 'kode_satuan';
    public $incrementing = false;
    protected $fillable = [
        'kode_satuan',
        'nama_satuan',
    ];
}
