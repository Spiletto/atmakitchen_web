<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table = 'penggajian';
    protected $primaryKey = 'id_penggajian';
    protected $fillable = ['id_karyawan', 'jumlah_hadir', 'jumlah_alpha', 'bonus_gaji', 'total_gaji', 'tanggal_gajian'];

    public function karyawan() {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
