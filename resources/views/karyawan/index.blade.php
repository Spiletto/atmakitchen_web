@extends('dashboard')

@section('content')
<div class="container">
    <h1>Karyawan List</h1>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Add New Karyawan</a>

    <!-- Search Form -->
    <form action="{{ route('karyawan.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Karyawans..." name="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
                <a href="{{ route('karyawan.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
            <tr>
                <td>{{ $karyawan->nama_karyawan }}</td>
                <td>{{ $karyawan->email_karyawan }}</td>
                <td>{{ $karyawan->role ? $karyawan->role->nama_role : 'N/A' }}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $karyawan->id_karyawan) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST" style="display:inline-block;">
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
