@extends('dashboard')

@section('content')
<div class="container">
    <h1>List Pembelian Bahan Baku</h1>
    <a href="{{ route('pembelianBahanBaku.create') }}" class="btn btn-primary mb-3">Add New Pembelian</a>
    <form action="{{ route('pembelianBahanBaku.search') }}" method="POST" class="mb-4">
    @csrf    
    <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Pembelian..." name="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
                <a href="{{ route('pembelianBahanBaku.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Bahan</th>
                <th>Jumlah Pembelian</th>
                <th>Harga Satuan</th>
                <th>Harga Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelianBahanBakus as $pembelian)
            <tr>
                <td>{{ $pembelian->bahanBaku->nama_bahan }}</td>
                <td>{{ $pembelian->jumlah_pembelian }}</td>
                <td>{{ $pembelian->harga_satuan }}</td>
                <td>{{ $pembelian->harga_total }}</td>
                <td>
                    <a href="{{ route('pembelianBahanBaku.edit', $pembelian->id_pembelian) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('pembelianBahanBaku.destroy', $pembelian->id_pembelian) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
