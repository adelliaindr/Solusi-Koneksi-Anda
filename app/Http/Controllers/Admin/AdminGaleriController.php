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

        if ($request->filled('kategori')) {
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
        'deskripsi' => 'nullable|string',
        'tanggal' => 'nullable|date',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $imagePath = $request->file('image')->store('galeri', 'public');

    Galeri::create([
        'title' => $request->title,
        'kategori' => $request->kategori,
        'deskripsi' => $request->deskripsi,
        'tanggal' => $request->tanggal ?? now()->toDateString(),
        'image' => $imagePath,
    ]);

    return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
}

    public function show($id)
    {
        $galeris = Galeri::findOrFail($id);
        return view('admin.galeri.show', compact('galeris'));
    }

    public function edit($id)
    {
        $galeris = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeris'));
    }

    public function update(Request $request, $id)
{
    $galeris = Galeri::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'kategori' => 'required|string|max:100',
        'deskripsi' => 'nullable|string',
        'tanggal' => 'nullable|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($galeris->image && Storage::disk('public')->exists($galeris->image)) {
            Storage::disk('public')->delete($galeris->image);
        }
        $galeris->image = $request->file('image')->store('galeri', 'public');
    }

    $galeris->title = $request->title;
    $galeris->kategori = $request->kategori;
    $galeris->deskripsi = $request->deskripsi;
    $galeris->tanggal = $request->tanggal ?? $galeris->tanggal;
    $galeris->save();

    return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil diperbarui!');
}

    public function destroy($id)
    {
        $galeris = Galeri::findOrFail($id);

        if ($galeris->image && Storage::disk('public')->exists($galeris->image)) {
            Storage::disk('public')->delete($galeris->image);
        }

        $galeris->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }

    public function destroyKomentar($id)
    {
        $komentar = \App\Models\Komentar::findOrFail($id);
        $komentar->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}