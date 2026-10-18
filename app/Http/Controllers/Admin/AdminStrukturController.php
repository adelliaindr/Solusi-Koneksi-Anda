<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminStrukturController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::orderBy('urutan', 'asc')->get();
        return view('admin.struktur.index', compact('struktur'));
    }

    public function create()
    {
        return view('admin.struktur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan'    => 'required|integer|min:0',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        StrukturOrganisasi::create($validated);

        return redirect()->route('struktur.index')->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function show($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur.show', compact('struktur'));
    }

    public function edit($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur.edit', compact('struktur'));
    }

    public function update(Request $request, $id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan'    => 'required|integer|min:0',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {
                Storage::disk('public')->delete($struktur->foto);
            }
            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        $struktur->update($validated);

        return redirect()->route('struktur.index')->with('success', 'Data anggota tim berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        
        if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {
            Storage::disk('public')->delete($struktur->foto);
        }

        $struktur->delete();

        return redirect()->route('struktur.index')->with('success', 'Anggota tim berhasil dihapus!');
    }
}