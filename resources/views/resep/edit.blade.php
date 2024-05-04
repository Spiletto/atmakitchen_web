@extends('dashboard')

@section('content')
<div class="container">
    <h2>Edit Recipe</h2>
    @foreach($resep as $r)
    <form action="{{ route('resep.update', ['id'=>$r->id_resep, 'id_bahan'=>$r->dr_id_bahan,'id_produk'=>$r->id_produk]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="id_produk">Product</label>
            <select class="form-control" id="id_produk" name="id_produk">
                @foreach($produks as $produk)
                    <option value="{{ $produk->id_produk }}" {{ $r->id_produk == $produk->id_produk ? 'selected' : '' }}>{{ $produk->nama_produk }}</option>
                @endforeach
            </select>
        </div>

        <div id="ingredients-container">
            <div class="input-group mb-3">
                <select class="form-control" name="id_bahan">
                    @foreach($bahanBakus as $bahan)
                        <option value="{{ $bahan->id_bahan }}" {{ $r->dr_id_bahan == $bahan->id_bahan ? 'selected' : '' }}>{{ $bahan->nama_bahan }}</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah" value="{{ $r->jumlah }}" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
    @endforeach
</div>
@endsection
