<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id_bahan';
    protected $fillable = ['nama_bahan', 'stok_bahan'];

    public function detailResep() {
        return $this->hasMany(DetailResep::class, 'id_bahan');
    }

    public function pembelianBahanBaku() {
        return $this->hasMany(PembelianBahanBaku::class, 'id_bahan');
    }

    public function pemakaianBahanBaku() {
        return $this->hasMany(PemakaianBahanBaku::class, 'id_bahan');
    }
}
