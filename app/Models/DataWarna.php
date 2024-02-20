<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWarna extends Model
{
    use HasFactory;
    protected $table = 'data_warnas';
    protected $primaryKey = 'kode_warna';
    public $incrementing = false;
    protected $fillable = [
        'kode_warna',
        'nama_warna',
    ];
}
