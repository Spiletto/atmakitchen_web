<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacamKetersediaan extends Model
{
    protected $table = 'macam_ketersediaan';
    protected $primaryKey = 'id_macam_ketersediaan';
    protected $fillable = ['detail_ketersediaan'];

    public function produk() {
        return $this->hasMany(Produk::class, 'id_macam_ketersediaan');
    }
}
