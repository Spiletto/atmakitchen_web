@extends('dashboard')

@section('content')
<div class="container">
    <h2>Add New Pembelian Bahan Baku</h2>
    <form action="{{ route('pembelianBahanBaku.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="id_bahan">Bahan Baku</label>
            <select class="form-control" id="id_bahan" name="id_bahan">
                @foreach($bahanBakus as $bahan)
                <option value="{{ $bahan->id_bahan }}">{{ $bahan->nama_bahan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="jumlah_pembelian">Jumlah Pembelian</label>
            <input type="number" class="form-control" id="jumlah_pembelian" name="jumlah_pembelian" required>
        </div>
        <div class="form-group mb-3">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
