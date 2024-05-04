@extends('dashboard')

@section('content')
<div class="container">
    <h1>Recipes List</h1>
    <a href="{{ route('resep.create') }}" class="btn btn-primary mb-3">Add New Recipe</a>
    <!-- Search Form -->
    <form action="{{ route('resep.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search recipes..." name="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
                <a href="{{ route('resep.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Nama Bahan</th>
                    <th>Jumlah</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reseps as $resep)
                <tr>
                    <td>{{ $resep->id_resep }}</td>
                    <td>{{ $resep->nama_produk}}</td>
                    <td>{{ $resep->nama_bahan}}</td>
                    <td>{{ $resep->jumlah}}</td>
                    <td>
                        <a href="{{ route('resep.edit', ['id'=>$resep->id_resep, 'id_bahan'=>$resep->dr_id_bahan]) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('resep.destroy', ['id'=>$resep->id_resep, 'id_bahan'=>$resep->dr_id_bahan]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No recipes available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($reseps->isEmpty())
        <div class="alert alert-warning" role="alert">
            There are no recipes currently available. Click <strong>Add New Recipe</strong> to create one.
        </div>
    @endif
</div>
@endsection
