<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUkuran extends Model
{
    use HasFactory;
    protected $table = 'data_ukurans';
    protected $primaryKey = 'kode_ukuran';
    public $incrementing = false;
    protected $fillable = [
        'kode_ukuran',
        'nama_ukuran',
    ];
}
