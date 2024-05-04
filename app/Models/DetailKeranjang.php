<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailKeranjang extends Model
{
    protected $table = 'detail_keranjang';
    protected $primaryKey = 'id_detail_keranjang';
    protected $fillable = ['id_hampers', 'id_produk', 'id_keranjang', 'jumlah_produk', 'harga_total'];

    public function hampers() {
        return $this->belongsTo(Hampers::class, 'id_hampers');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function keranjang() {
        return $this->belongsTo(Keranjang::class, 'id_keranjang');
    }
}
