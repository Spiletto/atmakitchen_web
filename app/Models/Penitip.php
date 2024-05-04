<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penitip extends Model
{
    protected $table = 'penitip';
    protected $primaryKey = 'id_penitip';
    protected $fillable = ['nama_penitip', 'noTelp_penitip'];

    public function produk() {
        return $this->hasMany(Produk::class, 'id_penitip');
    }
}
