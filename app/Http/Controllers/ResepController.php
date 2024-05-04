<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Produk;
use App\Models\DetailResep;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index(Request $request)
    {
        if($request->search != ''){
            $reseps = Resep::join('produk', 'produk.id_produk', '=', 'resep.id_produk')->join('detail_resep', 'resep.id_resep', '=', 'detail_resep.id_resep')->join('bahan_baku', 'bahan_baku.id_bahan', '=', 'detail_resep.id_bahan')->select('detail_resep.id_resep as id_resep', 'detail_resep.jumlah as jumlah', 'detail_resep.id_bahan as dr_id_bahan', 'resep.*', 'produk.nama_produk', 'bahan_baku.nama_bahan')->where('produk.nama_produk', 'like', '%' . $request->search . '%')->orWhere('bahan_baku.nama_bahan', 'like', '%' . $request->search . '%')->get();
        }else{
            $reseps = Resep::join('produk', 'produk.id_produk', '=', 'resep.id_produk')->join('detail_resep', 'resep.id_resep', '=', 'detail_resep.id_resep')->join('bahan_baku', 'bahan_baku.id_bahan', '=', 'detail_resep.id_bahan')->select('detail_resep.id_resep as id_resep', 'detail_resep.jumlah as jumlah', 'detail_resep.id_bahan as dr_id_bahan', 'resep.*', 'produk.nama_produk', 'bahan_baku.nama_bahan')->orderBy('nama_produk')->get();
        
        }
        return view('resep.index', compact('reseps'));
    }

    public function create()
    {
        $produks = Produk::all();
        $bahanBakus = BahanBaku::all();
        return view('resep.create', compact('produks', 'bahanBakus'));
    }

    public function store(Request $request)
    {
        $resep = Resep::where('id_produk', $request->id_produk)->first();
        if (!$resep) {
            $resep = Resep::insertGetId(['id_produk' => $request->id_produk]);
            $detail = DetailResep::create([
                'id_resep' => $resep,
                'id_bahan' => $request->id_bahan,
                'jumlah' => $request->jumlah,
            ]);
        } else {
            $detail = DetailResep::create([
                'id_resep' => $resep->id_resep,
                'id_bahan' => $request->id_bahan,
                'jumlah' => $request->jumlah,
            ]);
        }
        return redirect()->route('resep.index')->with('success', 'Recipe created successfully.');

    }
    public function edit($id, $id_bahan)
    {
        $resep = Resep::join('produk', 'produk.id_produk', '=', 'resep.id_produk')->join('detail_resep', 'resep.id_resep', '=', 'detail_resep.id_resep')->join('bahan_baku', 'bahan_baku.id_bahan', '=', 'detail_resep.id_bahan')->select('detail_resep.id_resep as id_resep', 'detail_resep.jumlah as jumlah', 'detail_resep.id_bahan as dr_id_bahan', 'resep.*', 'produk.nama_produk', 'bahan_baku.nama_bahan')->where('resep.id_resep', '=', $id)->where('detail_resep.id_bahan', '=', $id_bahan)->get();
        // dd($resep);
        $produks = Produk::all();
        $bahanBakus = BahanBaku::all();
        $id_resep = $id;
        return view('resep.edit', compact('resep', 'produks', 'bahanBakus', 'id_resep', 'id_bahan'));
    }

    public function update(Request $request, $id, $id_bahan, $id_produk)
    {
        $resep = Resep::where('id_resep', '=', $id)->where('id_produk', '=', $id_produk)->first();

        // Check if the Resep was found
        if (!$resep) {
            return back()->with('error', 'No matching recipe found.');
        }
        $resep->update([
            'id_produk' => $request->id_produk,
        ]);
        $updated = DetailResep::where('id_resep', $resep->id_resep)
            ->where('id_bahan', $id_bahan)
            ->update([
                'id_bahan' => $request->id_bahan,
                'jumlah' => $request->jumlah
            ]);
        if ($updated == 0) { // No rows updated
            return back()->with('error', 'No DetailResep found or data is the same as existing.');
        }
        return redirect()->route('resep.index')->with('success', 'Recipe updated successfully.');

    }


    public function destroy($id, $id_bahan)
    {
        DetailResep::where('id_resep','=', $id)->where('id_bahan','=', $id_bahan)->delete();
        Resep::where('id_resep','=', $id)->delete();
        return redirect()->route('resep.index')->with('success', 'Recipe deleted successfully.');
    }
}
