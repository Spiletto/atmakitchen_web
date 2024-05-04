<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacamPengeluaran extends Model
{
    protected $table = 'macam_pengeluaran';
    protected $primaryKey = 'id_macam_pengeluaran';
    protected $fillable = ['detail_pengeluaran'];

    public function pengeluaran() {
        return $this->hasMany(Pengeluaran::class, 'id_macam_pengeluaran');
    }
}
