<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\MacamKetersediaan;
use App\Models\UkuranProduk;
use App\Models\KategoriProduk;
use App\Models\Packaging;
use App\Models\Penitip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $macamKetersediaans = MacamKetersediaan::all();
        $ukuranProduks = UkuranProduk::all();
        $kategoriProduks = KategoriProduk::all();
        $packagings = Packaging::all();
        $penitips = Penitip::all();

        return view('produk.create', compact('macamKetersediaans', 'ukuranProduks', 'kategoriProduks', 'packagings', 'penitips'));
    }

    public function store(Request $request)
    {
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'id_macam_ketersediaan' => $request->id_macam_ketersediaan,
            'id_ukuran' => $request->id_ukuran,
            'id_kategori' => $request->id_kategori,
            'id_packaging' => $request->id_packaging,
            'id_penitip' => $request->id_penitip,
            'limit_kuota_harian' => $request->limit_kuota_harian,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $produk = Produk::whereRaw("CONCAT(nama_produk, ' ', harga_produk, ' ', stok_produk, ' ', deskripsi_produk, ' ', limit_kuota_harian) LIKE ?", ["%{$search}%"])->get();

        return view('produk.index', compact('produk'));
    }
    public function show()
    {
    }
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $macamKetersediaans = MacamKetersediaan::all();
        $ukuranProduks = UkuranProduk::all();
        $kategoriProduks = KategoriProduk::all();
        $packagings = Packaging::all();
        $penitips = Penitip::all();

        return view('produk.edit', compact('produk', 'macamKetersediaans', 'ukuranProduks', 'kategoriProduks', 'packagings', 'penitips'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        
        $data = $request->only('nama_produk', 'harga_produk', 'stok_produk', 'deskripsi_produk', 'id_macam_ketersediaan', 'id_ukuran', 'id_kategori', 'id_packaging', 'id_penitip', 'limit_kuota_harian');

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
