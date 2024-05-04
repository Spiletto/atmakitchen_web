<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::join('keranjang', 'transaksi.id_keranjang', '=', 'keranjang.id_keranjang')
                          ->join('detail_keranjang', 'keranjang.id_keranjang', '=', 'detail_keranjang.id_keranjang')
                          ->join('produk', 'detail_keranjang.id_produk', '=', 'produk.id_produk')
                          ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
                          ->select('transaksi.*', 'produk.nama_produk', 'customer.nama as customer_nama');
        if ($request->has('search') && $request->search != '') {
            $query->where('produk.nama_produk', 'like', '%' . $request->search . '%');
        }
        $transaksis = $query->get();

        return view('transaksi.index', compact('transaksis'));
    }
}
