<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class AdminKontakController extends Controller
{
    // 1. Tampil Daftar Pesan Masuk
    public function index()
    {
        $kontaks = Kontak::latest()->paginate(10);
        return view('admin.kontak.index', compact('kontaks'));
    }

    // 2. Halaman Detail Pesan Masuk
    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.show', compact('kontak'));
    }

    // 3. Hapus Pesan
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('kontak.index')->with('success', 'Pesan kontak berhasil dihapus!');
    }
}