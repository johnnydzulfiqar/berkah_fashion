<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeliBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'beli_bahan_bakus';
    protected $primaryKey = 'kode_belibahanbaku';
    public $incrementing = false;
    protected $fillable = [
        'kode_belibahanbaku',
        'total_jumlahbeli',
        'tgl_beli',
        'status_beli',
    ];
    
    public function R_KeStatusBeli(){
        //(Strukturnya yaitu : 'atribut tabel Belibahanbaku','atribut tabel StatusBeli');
        return $this -> belongsTo(StatusBeli::class,'status_beli','kode_statusbeli');
    }
    public function detailBeliBahanBakus()
    {
        return $this->hasMany(DetailBeliBahanBaku::class, 'kode_belibahanbaku', 'kode_belibahanbaku');
    }

     // Method to calculate and update total_jumlahbeli
     public function hitungTotalJumlahBeli()
     {
         $totalJumlahBeli = $this->detailBeliBahanBakus()->sum('jumlah_beli');
         $this->update(['total_jumlahbeli' => $totalJumlahBeli]);
     }
}
