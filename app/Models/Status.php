<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $fillable = ['keterangan_status'];

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'id_status');
    }

    public function refundSaldo() {
        return $this->hasMany(RefundSaldo::class, 'id_status');
    }
}
