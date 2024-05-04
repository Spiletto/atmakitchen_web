@extends('dashboard')

@section('content')
<div class="container">
    <h1>Produk List</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Add New Produk</a>

    <!-- Search Form -->
    <form action="{{ route('produk.search') }}" method="POST" class="mb-4">
    @csrf
    <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search produk..." name="search" required>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            <a class="btn btn-outline-primary" href="{{route('produk.index')}}">Reset</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Limit Kuota Harian</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $item)
                <tr>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->harga_produk }}</td>
                    <td>{{ $item->stok_produk }}</td>
                    <td>{{ $item->deskripsi_produk }}</td>
                    <td>{{ $item->limit_kuota_harian }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $item->id_produk) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id_produk) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No Produk Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
