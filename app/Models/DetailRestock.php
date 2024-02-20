<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRestock extends Model
{
    use HasFactory;
    protected $table = 'detail_restocks';
    protected $primaryKey = 'kode_detail_restock';
    public $incrementing = false;
    protected $fillable = [
        'kode_detail_restock',
        'kode_restock',
        'kode_bahanbaku',
        'kode_warna',
        'kode_satuan',
        'harga_item',
        'jumlah_item',
        'keterangan',
    ];

    public function R_KeRestock(){
        return $this -> belongsTo(Restock::class,'kode_restock','kode_restock');
    }

    public function R_KeBahanBaku(){
        return $this -> belongsTo(DataBahanBaku::class,'kode_bahanbaku','kode_bahanbaku');
    }
    public function R_KeWarna(){
        return $this -> belongsTo(DataWarna::class,'kode_warna','kode_warna');
    }
    public function R_KeSatuan(){
        return $this -> belongsTo(DataSatuan::class,'kode_satuan','kode_satuan');
    }
}
