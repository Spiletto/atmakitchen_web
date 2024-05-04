<?php

namespace App\Http\Controllers;

use App\Models\PembelianBahanBaku;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class PembelianBahanBakuController extends Controller
{
    public function index()
    {
        $pembelianBahanBakus = PembelianBahanBaku::with('bahanBaku')->get();
        return view('pembelianBahanBaku.index', compact('pembelianBahanBakus'));
    }

    public function create()
    {
        $bahanBakus = BahanBaku::all();
        return view('pembelianBahanBaku.create', compact('bahanBakus'));
    }

    public function store(Request $request)
    {
        $hargaTotal = $request->jumlah_pembelian * $request->harga_satuan;

        PembelianBahanBaku::create([
            'id_bahan' => $request->id_bahan,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'harga_satuan' => $request->harga_satuan,
            'harga_total' => $hargaTotal,
        ]);

        return redirect()->route('pembelianBahanBaku.index')->with('success', 'Pembelian berhasil ditambahkan.');
    }
    public function show(){

    }
    public function search(Request $request)
{
    $search = $request->input('search');

    $pembelianBahanBakus = PembelianBahanBaku::join('bahan_baku', 'pembelian_bahan_baku.id_bahan', '=', 'bahan_baku.id_bahan')
                            ->whereRaw("CONCAT(bahan_baku.nama_bahan, ' ', pembelian_bahan_baku.jumlah_pembelian, ' ', pembelian_bahan_baku.harga_satuan) LIKE ?", ["%{$search}%"])
                            ->select('pembelian_bahan_baku.*', 'bahan_baku.nama_bahan as nama_bahan')
                            ->get();

    return view('pembelianBahanBaku.index', compact('pembelianBahanBakus'));
}

    public function edit($id)
    {
        $pembelian = PembelianBahanBaku::findOrFail($id);
        $bahanBakus = BahanBaku::all();
        return view('pembelianBahanBaku.edit', compact('pembelian', 'bahanBakus'));
    }

    public function update(Request $request, $id)
    {
        $pembelian = PembelianBahanBaku::findOrFail($id);
        $hargaTotal = $request->jumlah_pembelian * $request->harga_satuan;

        $pembelian->update([
            'id_bahan' => $request->id_bahan,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'harga_satuan' => $request->harga_satuan,
            'harga_total' => $hargaTotal,
        ]);

        return redirect()->route('pembelianBahanBaku.index')->with('success', 'Pembelian berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $pembelian = PembelianBahanBaku::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelianBahanBaku.index')->with('success', 'Pembelian berhasil dihapus.');
    }
}
