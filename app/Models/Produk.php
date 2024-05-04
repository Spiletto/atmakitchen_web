<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;
    protected $fillable = [
        'nama_produk', 'harga_produk', 'stok_produk', 'deskripsi_produk', 
        'limit_kuota_harian', 'id_macam_ketersediaan', 'id_ukuran', 
        'id_kategori', 'id_packaging', 'id_penitip'
    ];

    public function detailKeranjang() {
        return $this->hasMany(DetailKeranjang::class, 'id_produk');
    }

    public function resep() {
        return $this->hasOne(Resep::class, 'id_produk');
    }

    public function rincianHampers() {
        return $this->hasMany(RincianHampers::class, 'id_produk');
    }

    public function kategoriProduk() {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori');
    }

    public function ukuranProduk() {
        return $this->belongsTo(UkuranProduk::class, 'id_ukuran');
    }

    public function packaging() {
        return $this->belongsTo(Packaging::class, 'id_packaging');
    }

    public function penitip() {
        return $this->belongsTo(Penitip::class, 'id_penitip');
    }
}
