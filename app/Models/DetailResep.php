<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
    protected $table = 'detail_resep';
    protected $fillable = ['id_resep', 'id_bahan', 'jumlah'];
    public $timestamps = false;
    public function bahanBaku() {
        return $this->belongsTo(BahanBaku::class, 'id_bahan');
    }
}