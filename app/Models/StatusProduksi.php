<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProduksi extends Model
{
    use HasFactory;
    protected $table = 'status_produksis';
    protected $primaryKey = 'kode_statusproduksi';
    protected $fillable = ['kode_statusproduksi', 'status_produksi'];
}
