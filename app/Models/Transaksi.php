<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_customer', 'id_macam_pengambilan', 'id_keranjang', 'id_status', 'id_alamat',
        'tanggal_pesan', 'tanggal_lunas', 'tanggal_ambil', 'total_harga_produk',
        'jarak_pengiriman', 'ongkir', 'penggunaan_poin', 'grand_total', 'perolehan_poin', 'tip', 'status_transaksi'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function macamPengambilan() {
        return $this->belongsTo(MacamPengambilan::class, 'id_macam_pengambilan');
    }

    public function keranjang() {
        return $this->belongsTo(Keranjang::class, 'id_keranjang');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function alamat() {
        return $this->belongsTo(Alamat::class, 'id_alamat');
    }

    public function pemakaianBahanBaku() {
        return $this->hasMany(PemakaianBahanBaku::class, 'id_transaksi');
    }
}
