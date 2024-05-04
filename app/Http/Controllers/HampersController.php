<?php

namespace App\Http\Controllers;

use App\Models\Hampers;
use App\Models\Packaging;
use Illuminate\Http\Request;

class HampersController extends Controller
{
    public function index()
    {
        $hampers = Hampers::with('packaging')->paginate(10);
        return view('hampers.index', compact('hampers'));
    }

    public function create()
    {
        $packagings = Packaging::all();
        return view('hampers.create', compact('packagings'));
    }

    public function store(Request $request)
    {
        Hampers::create($request->all());
        return redirect()->route('hampers.index')->with('success', 'Hampers successfully added.');
    }
    public function show(){

    }
    public function search(Request $request)
{
    $search = $request->input('search');

    $hampers = Hampers::whereRaw("CONCAT(nama_hampers, ' ', harga_hampers, ' ', stok_hampers, ' ', packaging.detail_packaging) LIKE ?", ["%{$search}%"])
                      ->join('packaging', 'hampers.id_packaging', '=', 'packaging.id_packaging')
                      ->select('hampers.*', 'packaging.detail_packaging as packaging_name')
                      ->get();

    return view('hampers.index', compact('hampers'));
}

    public function edit($id)
    {
        $hampers = Hampers::findOrFail($id);
        $packagings = Packaging::all();
        return view('hampers.edit', compact('hampers', 'packagings'));
    }

    public function update(Request $request, $id)
    {

        $hampers = Hampers::findOrFail($id);
        $hampers->update($request->all());

        return redirect()->route('hampers.index')->with('success', 'Hampers updated successfully.');
    }

    public function destroy($id)
    {
        $hampers = Hampers::findOrFail($id);
        $hampers->delete();

        return redirect()->route('hampers.index')->with('success', 'Hampers deleted successfully.');
    }
}
