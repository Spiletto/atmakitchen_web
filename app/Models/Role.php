<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $fillable = ['nama_role'];

    public function karyawan() {
        return $this->hasMany(Karyawan::class, 'id_role');
    }
}
