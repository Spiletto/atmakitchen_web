<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    protected $table = 'packaging';
    protected $primaryKey = 'id_packaging';
    protected $fillable = ['detail_packaging', 'stok_packaging'];

    public function hampers() {
        return $this->hasMany(Hampers::class, 'id_packaging');
    }

    public function produk() {
        return $this->hasMany(Produk::class, 'id_packaging');
    }
}
