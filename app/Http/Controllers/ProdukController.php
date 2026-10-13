<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::latest();

        // Filter berdasarkan kategori jika dipilih di menu navbar atas
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        $produk = $query->paginate(9);

        return view('produk.index', compact('produk'));
    }
    public function show($id)
    {
        $produks = Produk::findOrFail($id);
        return view('produk.show', compact('produks'));
    }
}
