<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::latest();

        // Filter berdasarkan kategori jika dipilih di navbar publik
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        $galeris = $query->paginate(8);

        return view('admin.galeri.index', compact('galeris'));
    }


    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string', // Ganti description
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('galeri', 'public');

        Galeri::create([
            'title' => $request->title,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi, // Ganti description
            'image' => $imagePath,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string', // Ganti description
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }
            $galeri->image = $request->file('image')->store('galeri', 'public');
        }

        $galeri->title = $request->title;
        $galeri->kategori = $request->kategori;
        $galeri->deskripsi = $request->deskripsi; // Ganti description
        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
            Storage::disk('public')->delete($galeri->image);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }

    public function destroyKomentar($id)
    {
        $komentar = \App\Models\Komentar::findOrFail($id);
        $komentar->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}