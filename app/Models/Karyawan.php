<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Karyawan extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    public $timestamps = false;
    protected $fillable = ['id_role', 'nama_karyawan', 'noTelp_karyawan', 'email_karyawan', 'username', 'password', 'alamat_karyawan', 'gaji_harian', 'gaji_bonus'];

    public function role() {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function penggajian() {
        return $this->hasMany(Penggajian::class, 'id_karyawan');
    }

    public function presensi() {
        return $this->hasMany(Presensi::class, 'id_karyawan');
    }

}
