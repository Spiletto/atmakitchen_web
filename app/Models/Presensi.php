<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    protected $fillable = ['id_karyawan', 'tanggal_alpha'];

    public function karyawan() {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
