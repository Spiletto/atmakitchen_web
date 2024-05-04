@extends('dashboard')

@section('content')
<div class="container">
    <h2>Add New Employee</h2>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama_karyawan">Name</label>
            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
        </div>
        <div class="form-group mb-3">
            <label for="noTelp_karyawan">Phone Number</label>
            <input type="text" class="form-control" id="noTelp_karyawan" name="noTelp_karyawan" required>
        </div>
        <div class="form-group mb-3">
            <label for="email_karyawan">Email</label>
            <input type="email" class="form-control" id="email_karyawan" name="email_karyawan" required>
        </div>
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group mb-3">
            <label for="alamat_karyawan">Address</label>
            <textarea class="form-control" id="alamat_karyawan" name="alamat_karyawan" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="gaji_harian">Daily Salary</label>
            <input type="number" class="form-control" id="gaji_harian" name="gaji_harian" required>
        </div>
        <div class="form-group mb-3">
            <label for="gaji_bonus">Bonus</label>
            <input type="number" class="form-control" id="gaji_bonus" name="gaji_bonus" required>
        </div>
        <div class="form-group mb-3">
            <label for="id_role">Role</label>
            <select class="form-control" id="id_role" name="id_role">
                @foreach ($roles as $role)
                    <option value="{{ $role->id_role }}">{{ $role->nama_role }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
