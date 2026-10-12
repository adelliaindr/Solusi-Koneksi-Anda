<?php

namespace App\Http\Controllers;

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

        return back()->with('success', 'Pesan Anda berhasil dikirim! Terima kasih telah menghubungi kami.');
        
    }
}
