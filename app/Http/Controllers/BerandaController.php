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
        $produks = Produk::latest()->take(3)->get();
        $artikels = Artikel::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(6)->get();

        return view('beranda', compact('produks', 'artikels', 'galeris'));
    }
}
