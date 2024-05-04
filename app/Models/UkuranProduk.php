<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UkuranProduk extends Model
{
    protected $table = 'ukuran_produk';
    protected $primaryKey = 'id_ukuran';
    protected $fillable = ['detail_ukuran'];

    public function produk() {
        return $this->hasMany(Produk::class, 'id_ukuran');
    }
}
