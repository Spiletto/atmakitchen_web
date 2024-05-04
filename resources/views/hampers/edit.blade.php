@extends('dashboard')

@section('content')
<div class="container">
    <h2>Edit Hampers</h2>
    <form action="{{ route('hampers.update', $hampers->id_hampers) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nama_hampers">Name</label>
            <input type="text" class="form-control" id="nama_hampers" name="nama_hampers" value="{{ $hampers->nama_hampers }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="harga_hampers">Price</label>
            <input type="number" class="form-control" id="harga_hampers" name="harga_hampers" value="{{ $hampers->harga_hampers }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="stok_hampers">Stock</label>
            <input type="number" class="form-control" id="stok_hampers" name="stok_hampers" value="{{ $hampers->stok_hampers }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="id_packaging">Packaging</label>
            <select class="form-control" id="id_packaging" name="id_packaging">
                @foreach ($packagings as $packaging)
                    <option value="{{ $packaging->id_packaging }}" {{ ($hampers->id_packaging == $packaging->id) ? 'selected' : '' }}>{{ $packaging->detail_packaging }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
