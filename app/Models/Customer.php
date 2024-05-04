<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id_customer';
    protected $table = 'customer';
    protected $fillable = ['nama', 'no_telepon', 'username', 'password', 'email', 'saldo', 'poin'];
    public $timestamps = false;
    public function alamat() {
        return $this->hasMany(Alamat::class, 'id_customer');
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'id_customer');
    }

    public function refundSaldo() {
        return $this->hasMany(RefundSaldo::class, 'id_customer');
    }
}
