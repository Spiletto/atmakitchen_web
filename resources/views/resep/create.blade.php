@extends('dashboard')

@section('content')
<div class="container">
    <h2>Add New Recipe</h2>
    <form action="{{ route('resep.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="id_produk">Product</label>
            <select class="form-control" id="id_produk" name="id_produk">
                @foreach($produks as $produk)
                    <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                @endforeach
            </select>
        </div>

        <div id="ingredients-container">
            <label for="ingredients">Ingredients</label>
            <div class="input-group mb-3">
                <select class="form-control" name="id_bahan">
                    @foreach($bahanBakus as $bahan)
                        <option value="{{ $bahan->id_bahan }}">{{ $bahan->nama_bahan }}</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah" placeholder="Amount" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
