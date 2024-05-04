<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';
    protected $fillable = ['id_customer', 'detail_alamat'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
