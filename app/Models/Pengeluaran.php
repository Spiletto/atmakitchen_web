<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = ['id_macam_pengeluaran', 'tanggal_pengeluaran', 'jumlah_pengeluaran'];

    public function macamPengeluaran() {
        return $this->belongsTo(MacamPengeluaran::class, 'id_macam_pengeluaran');
    }
}
