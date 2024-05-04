<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Constructor to add middleware to redirect if authenticated
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login attempt
    public function login(Request $request)
    {
        // dd($request);
        if (Auth::guard('karyawan')->attempt(['email_karyawan' => $request->email_karyawan, 'password' => $request->password], $request->filled('remember'))) {
            return view('dashboard');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    // Karyawan logout
    public function logout(Request $request)
    {
        Auth::guard('karyawan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
