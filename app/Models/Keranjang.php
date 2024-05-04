<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $fillable = ['harga_keranjang'];

    public function detailKeranjang() {
        return $this->hasMany(DetailKeranjang::class, 'id_keranjang');
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'id_keranjang');
    }
}
