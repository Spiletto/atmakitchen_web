@extends('dashboard')

@section('content')
<div class="container">
    <h2>Edit Employee</h2>
    <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nama_karyawan">Name</label>
            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="noTelp_karyawan">Phone Number</label>
            <input type="text" class="form-control" id="noTelp_karyawan" name="noTelp_karyawan" value="{{ $karyawan->noTelp_karyawan }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email_karyawan">Email</label>
            <input type="email" class="form-control" id="email_karyawan" name="email_karyawan" value="{{ $karyawan->email_karyawan }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $karyawan->username }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">New Password (optional)</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Fill only to change">
        </div>
        <div class="form-group mb-3">
            <label for="alamat_karyawan">Address</label>
            <textarea class="form-control" id="alamat_karyawan" name="alamat_karyawan" required>{{ $karyawan->alamat_karyawan }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="gaji_harian">Daily Salary</label>
            <input type="number" class="form-control" id="gaji_harian" name="gaji_harian" value="{{ $karyawan->gaji_harian }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="gaji_bonus">Bonus</label>
            <input type="number" class="form-control" id="gaji_bonus" name="gaji_bonus" value="{{ $karyawan->gaji_bonus }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="id_role">Role</label>
            <select class="form-control" id="id_role" name="id_role">
                @foreach ($roles as $role)
                    <option value="{{ $role->id_role }}" {{ $karyawan->id_role == $role->id_role ? 'selected' : '' }}>{{ $role->nama_role }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
