<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStatusUpah extends Model
{
    use HasFactory;
    protected $table = 'data_status_upahs';
    protected $primaryKey = 'kode_statusupah';
    public $incrementing = false;
    protected $fillable = [
        'kode_statusupah',
        'status_upah'
    ];
}
