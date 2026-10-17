<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Menampilkan halaman form login admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses autentikasi login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang kembali, Admin!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Dashboard Admin Sederhana
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Berhasil keluar dari panel admin.');
    }

    public function editProfile()
    {
        $admin = Auth::user();
        return view('admin.profil.edit', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|min:6|confirmed', // jika ingin ganti password
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profil.edit')->with('success', 'Profil admin berhasil diperbarui!');
    }
}
