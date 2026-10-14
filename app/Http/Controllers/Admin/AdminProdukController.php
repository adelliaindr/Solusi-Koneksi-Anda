<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    // Nilai kategori yang diizinkan (sama dengan value di dropdown)
    private const KATEGORI = [
        'infrastruktur jaringan',
        'telekomunikasi & konektivitas',
        'solusi teknologi informasi',
    ];

    public function index()
    {
        $produks = Produk::latest()->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'kategori'    => ['required', Rule::in(self::KATEGORI)],
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produk', 'public');
        }

        Produk::create([
            'name'        => $validated['name'],
            'kategori'    => $validated['kategori'],
            'description' => $validated['description'],
            'image'       => $imagePath,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Halaman Detail Produk (Lihat)
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }

    // Halaman Form Edit Produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    // Update Data Produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'kategori'    => ['required', Rule::in(self::KATEGORI)],
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($produk->image && Storage::disk('public')->exists($produk->image)) {
                Storage::disk('public')->delete($produk->image);
            }
            $produk->image = $request->file('image')->store('produk', 'public');
        }

        $produk->name        = $validated['name'];
        $produk->kategori    = $validated['kategori'];
        $produk->description = $validated['description'];
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus Produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->image && Storage::disk('public')->exists($produk->image)) {
            Storage::disk('public')->delete($produk->image);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}