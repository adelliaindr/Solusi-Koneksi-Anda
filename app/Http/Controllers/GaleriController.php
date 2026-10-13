<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Komentar;
use App\Models\Like;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request){
        $query = Galeri::latest();

        // Filter berdasarkan kategori jika dipencet dari top navigation bar
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        $galeris = $query->paginate(12);

        return view('galeri.index', compact('galeris'));
    }

    // Menampilkan detail 1 foto galeri
    public function show($id)
    {
        $galeris = Galeri::with('komentars')->findOrFail($id);

        return view('galeri.show', compact('galeris'));
    }

    // Fitur Like per Foto Galeri
    public function like($id, Request $request)
    {
        $ip = $request->ip();
        $alreadyLiked = Like::where('galeri_id', $id)->where('ip_address', $ip)->first();

        if (!$alreadyLiked) {
            Like::create([
                'galeri_id' => $id,
                'ip_address' => $ip
            ]);
            return back()->with('success', 'Terima kasih telah menyukai foto ini!');
        }

        return back()->with('info', ' Anda sudah menyukai foto ini sebelumnya.');
    }
    
    // Fungsi untuk Kirim Komentar per Foto Galeri

    public function comment(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pengirim' => 'required|string|max:100', // Sesuaikan dengan nama input di form
            'isi_komentar'  => 'required|string|max:1000',
        ]);

        $galeri = Galeri::findOrFail($id);

        $galeri->komentars()->create([
            'nama_pengirim' => $validated['nama_pengirim'],
            'isi_komentar'  => $validated['isi_komentar'],
        ]);

        return back()->with('success', 'Komentar Anda berhasil terkirim pada foto ini!');
        
    }

}
