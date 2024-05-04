<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan; // Ensure this is pointing to the correct model path
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Create a new karyawan
        $karyawan = Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'noTelp_karyawan' => $request->no_telp,
            'email_karyawan' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat_karyawan' => $request->alamat,
            'gaji_harian' => 0,
            'gaji_bonus' => 0,
            'id_role' => 1,
        ]);

        // Log the user in
        if (Auth::guard('karyawan')->attempt(['email_karyawan' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
