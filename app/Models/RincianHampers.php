<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RincianHampers extends Model
{
    protected $table = 'rincian_hampers';
    public $incrementing = false;
    protected $fillable = ['id_hampers', 'id_produk'];

    public function hampers() {
        return $this->belongsTo(Hampers::class, 'id_hampers');
    }
    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
