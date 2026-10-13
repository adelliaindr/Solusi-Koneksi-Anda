<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'judul' => 'required|string|max:150',
            'pesan' => 'required|string|max:2000',
        ]);

        // Simpan ke database dengan memetakan input ke kolom database
        Kontak::create([
            'name'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->judul,
            'message' => $request->pesan,
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim! Terima kasih telah menghubungi kami.');
        
    }
}
