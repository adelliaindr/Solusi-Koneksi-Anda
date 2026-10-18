<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\Galeri;

class BerandaController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::first();
        $produks = Produk::latest()->take(4)->get();
        $artikels = Artikel::latest()->take(4)->get();
        $galeris = Galeri::latest()->take(4)->get();

        return view('beranda', compact('profile','produks', 'artikels', 'galeris'));
    }
}
