<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(6);
        return view('produk.index', compact('produks'));
    }
    public function show($id)
    {
        $produks = Produk::findOrFail($id);
        return view('produk.show', compact('produks'));
    }
}
