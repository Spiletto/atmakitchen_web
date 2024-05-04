<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefundSaldo extends Model
{
    protected $table = 'refund_saldo';
    protected $primaryKey = 'id_refund';
    protected $fillable = ['jumlah_refund', 'id_status', 'id_customer', 'nama_bank', 'no_rekening', 'tanggal_refund'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
