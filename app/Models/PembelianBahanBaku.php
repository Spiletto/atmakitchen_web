<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembelianBahanBaku extends Model
{
    protected $table = 'pembelian_bahan_baku';
    protected $primaryKey = 'id_pembelian';
    public $timestamps = false;
    protected $fillable = ['id_bahan', 'jumlah_pembelian', 'harga_satuan', 'harga_total'];

    public function bahanBaku() {
        return $this->belongsTo(BahanBaku::class, 'id_bahan');
    }
}
