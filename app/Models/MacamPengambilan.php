<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacamPengambilan extends Model
{
    protected $table = 'macam_pengambilan';
    protected $primaryKey = 'id_macam_pengambilan';
    protected $fillable = ['detail_pengambilan'];

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'id_macam_pengambilan');
    }
}
