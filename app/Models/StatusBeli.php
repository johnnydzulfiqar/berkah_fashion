<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBeli extends Model
{
    use HasFactory;
    protected $table = 'data_statusbeli';
    protected $primaryKey = 'kode_statusbeli';
    protected $fillable = ['kode_statusbeli', 'status_beli'];
}
