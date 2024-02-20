<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;
    protected $table = 'restocks';
    protected $primaryKey = 'kode_restock';
    public $incrementing = false;
    protected $fillable = [
        'kode_restock',
        'no_faktur',
        'kode_belibahanbaku',
        'total_hargaitem',
        'tgl_restock',
    ];
    public function R_KeBeliBahanBaku()
    {
        return $this->hasMany(BeliBahanBaku::class, 'kode_belibahanbaku', 'kode_belibahanbaku');
    }
    public function R_KeDetailRestock()
    {
        return $this->hasMany(DetailRestock::class, 'kode_restock', 'kode_restock');
    }
    
    public function hitungTotalHargaItem()
    {
        $totalHargaItem = 0;
    
        if ($this->detailRestocks) {
            foreach ($this->detailRestocks as $detailRestock) {
                $totalHargaItem += $detailRestock->harga_item * $detailRestock->jumlah_item;
            }
        }
        $this->update(['total_hargaitem' => $totalHargaItem]);
    }
}
