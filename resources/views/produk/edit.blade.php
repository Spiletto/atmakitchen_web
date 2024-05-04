@extends('dashboard')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div class="form-group mb-3">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
        </div>

        <!-- Harga Produk -->
        <div class="form-group mb-3">
            <label for="harga_produk">Harga</label>
            <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="{{ $produk->harga_produk }}" required>
        </div>

        <!-- Stok Produk -->
        <div class="form-group mb-3">
            <label for="stok_produk">Stok</label>
            <input type="number" class="form-control" id="stok_produk" name="stok_produk" value="{{ $produk->stok_produk }}" required>
        </div>

        <!-- Limit -->
        <div class="form-group mb-3">
            <label for="limit_kuota_harian">Limit Kuota Harian</label>
            <input type="number" class="form-control" id="limit_kuota_harian" name="limit_kuota_harian" value="{{ $produk->limit_kuota_harian }}" required>
        </div>

        <!-- Deskripsi Produk -->
        <div class="form-group mb-3">
            <label for="deskripsi_produk">Deskripsi</label>
            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3">{{ $produk->deskripsi_produk }}</textarea>
        </div>

        <!-- Dropdown for Macam Ketersediaan -->
        <div class="form-group mb-3">
            <label for="id_macam_ketersediaan">Macam Ketersediaan</label>
            <select class="form-control" id="id_macam_ketersediaan" name="id_macam_ketersediaan">
                @foreach ($macamKetersediaans as $mk)
                    <option value="{{ $mk->id_macam_ketersediaan }}" {{ $produk->id_macam_ketersediaan == $mk->id ? 'selected' : '' }}>
                        {{ $mk->detail_ketersediaan }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown for Ukuran Produk -->
        <div class="form-group mb-3">
            <label for="id_ukuran">Ukuran</label>
            <select class="form-control" id="id_ukuran" name="id_ukuran">
                @foreach ($ukuranProduks as $up)
                    <option value="{{ $up->id_ukuran }}" {{ $produk->id_ukuran == $up->id ? 'selected' : '' }}>
                        {{ $up->detail_ukuran }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown for Kategori Produk -->
        <div class="form-group mb-3">
            <label for="id_kategori">Kategori</label>
            <select class="form-control" id="id_kategori" name="id_kategori">
                @foreach ($kategoriProduks as $kp)
                    <option value="{{ $kp->id_kategori }}" {{ $produk->id_kategori == $kp->id ? 'selected' : '' }}>
                        {{ $kp->kategori_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown for Packaging -->
        <div class="form-group mb-3">
            <label for="id_packaging">Packaging</label>
            <select class="form-control" id="id_packaging" name="id_packaging">
                @foreach ($packagings as $packaging)
                    <option value="{{ $packaging->id_packaging }}" {{ $produk->id_packaging == $packaging->id ? 'selected' : '' }}>
                        {{ $packaging->detail_packaging }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown for Penitip -->
        <div class="form-group mb-3">
            <label for="id_penitip">Penitip</label>
            <select class="form-control" id="id_penitip" name="id_penitip">
                @foreach ($penitips as $penitip)
                    <option value="{{ $penitip->id_penitip }}" {{ $produk->id_penitip == $penitip->id ? 'selected' : '' }}>
                        {{ $penitip->nama_penitip }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
