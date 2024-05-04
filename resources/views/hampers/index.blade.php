@extends('dashboard')

@section('content')
<div class="container">
    <h1>Hampers List</h1>
    <a href="{{ route('hampers.create') }}" class="btn btn-primary mb-3">Add New Hampers</a>
    <!-- Search Form -->
    <form action="{{ route('hampers.search') }}" method="POST" class="mb-4">
    @csrf
    <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Hampers..." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
            <a href="{{ route('hampers.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Packaging</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hampers as $hamper)
                <tr>
                    <td>{{ $hamper->nama_hampers }}</td>
                    <td>{{ $hamper->harga_hampers }}</td>
                    <td>{{ $hamper->stok_hampers }}</td>
                    <td>{{ $hamper->packaging->detail_packaging }}</td>
                    <td>
                        <a href="{{ route('hampers.edit', $hamper->id_hampers) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('hampers.destroy', $hamper->id_hampers) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No Hampers Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
