<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'id_resep';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_produk'];
    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function details() {
        return $this->belongsTo(DetailResep::class, 'id_resep');
    }
}
