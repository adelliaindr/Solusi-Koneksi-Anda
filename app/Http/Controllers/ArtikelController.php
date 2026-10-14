<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index(){
        $artikels = Artikel::orderByDesc('tanggal_upload')->get();
        return view('artikel.index', compact('artikels'));
    }
    public function show($id)
    {
        $artikels = Artikel::findOrFail($id);
        return view('artikel.show', compact('artikels'));
    }
}
