<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRencanaProduksi extends Model
{
    use HasFactory;
    protected $table = 'detail_rencana_produksis';
    protected $primaryKey = 'kode_detail_rencanaproduksi';
    public $incrementing = false;
    protected $fillable = [
        'kode_detail_rencanaproduksi',
        'kode_rencanaproduksi',
        'kode_bahanbaku',
        'kode_warna_stokbahanbaku',
        'kode_satuan_stokbahanbaku',
        'jumlah_perlu_stokbahanbaku',
    ];

    public function R_KeRencanaproduksi()
    {
        return $this->belongsTo(RencanaProduksi::class, 'kode_rencanaproduksi', 'kode_rencanaproduksi');
    }
    public function R_KeDataBahanBaku()
    {
        return $this->belongsTo(DataBahanBaku::class, 'kode_bahanbaku', 'kode_bahanbaku');
    }
}
