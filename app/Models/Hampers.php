<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hampers extends Model
{
    protected $table = 'hampers';
    protected $primaryKey = 'id_hampers';
    public $timestamps = false;
    protected $fillable = ['harga_hampers', 'nama_hampers', 'stok_hampers', 'id_packaging'];

    public function packaging() {
        return $this->belongsTo(Packaging::class, 'id_packaging');
    }

    public function detailKeranjang() {
        return $this->hasMany(DetailKeranjang::class, 'id_hampers');
    }

    public function rincianHampers() {
        return $this->hasMany(RincianHampers::class, 'id_hampers');
    }
}
