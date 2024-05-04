<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index(Request $request)
{
    $query = Karyawan::with('role');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('nama_karyawan', 'like', '%' . $search . '%')
              ->orWhere('email_karyawan', 'like', '%' . $search . '%')
              ->orWhereHas('role', function ($qr) use ($search) {
                  $qr->where('nama_role', 'like', '%' . $search . '%');
              });
        });
    }

    $karyawans = $query->get();
    return view('karyawan.index', compact('karyawans'));
}
    public function create()
    {
        $roles = Role::all();
        return view('karyawan.create', compact('roles'));
    }

    public function store(Request $request)
    {

        Karyawan::create($request->all() + ['password' => Hash::make($request->password)]);

        return redirect()->route('karyawan.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $roles = Role::all();
        return view('karyawan.edit', compact('karyawan', 'roles'));
    }

    public function update(Request $request, $id)
    {

        $karyawan = Karyawan::findOrFail($id);
        $data = $request->except(['password']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $karyawan->update($data);

        return redirect()->route('karyawan.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        Karyawan::destroy($id);
        return redirect()->route('karyawan.index')->with('success', 'Employee deleted successfully.');
    }
}
