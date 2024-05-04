@extends('dashboard') 
@section('content')
<div class="container">
    <h1>Transactions</h1>
    <form action="{{ route('transaksi.index') }}" method="GET" class="mb-3">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search by Product Name..." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Tanggal Pesan</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Status Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->id_transaksi }}</td>
                <td>{{ $transaksi->tanggal_pesan }}</td>
                <td>{{ $transaksi->customer_nama }}</td>
                <td>{{ $transaksi->nama_produk }}</td>
                <td>{{ $transaksi->status_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
