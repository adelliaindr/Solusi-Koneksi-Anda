<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArtikelController extends Controller
{
    // 1. Tampil Daftar Artikel
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    // 2. Halaman Form Tambah Artikel
    public function create()
    {
        return view('admin.artikel.create');
    }

    // 3. Simpan Artikel Baru
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'kategori' => 'required|string|max:100',
        'tanggal_upload' => 'required|date',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('artikel', 'public');
    }

    Artikel::create([
        'title' => $validated['title'],
        'kategori' => $validated['kategori'],
        'tanggal_upload' => $validated['tanggal_upload'],
        'content' => $validated['content'],
        'image' => $imagePath,
    ]);

    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
}

    // 4. Halaman Detail Artikel
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    // 5. Halaman Form Edit Artikel
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    // 6. Update Data Artikel

public function update(Request $request, $id)
{
    $artikel = Artikel::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'kategori' => 'required|string|max:100',
        'tanggal_upload' => 'required|date',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($artikel->image && Storage::disk('public')->exists($artikel->image)) {
            Storage::disk('public')->delete($artikel->image);
        }
        $artikel->image = $request->file('image')->store('artikel', 'public');
    }

    $artikel->title = $validated['title'];
    $artikel->kategori = $validated['kategori'];
    $artikel->tanggal_upload = $validated['tanggal_upload'];
    $artikel->content = $validated['content'];
    $artikel->save();

    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
}

    // 7. Hapus Artikel
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->image && Storage::disk('public')->exists($artikel->image)) {
            Storage::disk('public')->delete($artikel->image);
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}