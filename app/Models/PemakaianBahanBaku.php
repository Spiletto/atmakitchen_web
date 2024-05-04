<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemakaianBahanBaku extends Model
{
    protected $table = 'pemakaian_bahan_baku';
    protected $primaryKey = 'id_pemakaian';
    protected $fillable = ['id_bahan', 'id_transaksi', 'jumlah_pemakaian', 'tanggal_pemakaian'];

    public function bahanBaku() {
        return $this->belongsTo(BahanBaku::class, 'id_bahan');
    }

    public function transaksi() {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
