<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    /**
     * Menampilkan halaman & form edit profil perusahaan sekaligus di admin.
     */
    public function index()
    {
        // Mengambil data profil pertama, atau buat otomatis jika belum ada
        $profile = Profile::firstOrCreate(
            ['id' => 1],
            [
                'nama_perusahaan' => 'PT Solusi Koneksi Anda',
                'sambutan' => 'Selamat datang di PT Solusi Koneksi Anda.',
                'sejarah' => 'Perusahaan kami didirikan untuk memberikan layanan terbaik.',
                'visi' => 'Menjadi penyedia solusi terdepan.',
                'misi' => 'Memberikan layanan berkualitas tinggi.'
            ]
        );

        return view('admin.profil_perusahaan', compact('profile'));
    }

    /**
     * Menyimpan perubahan data profil perusahaan.
     */
    public function update(Request $request)
    {
        $profile = Profile::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'sambutan'        => 'nullable|string',
            'sejarah'         => 'nullable|string',
            'visi'            => 'nullable|string',
            'misi'            => 'nullable|string',
        ]);

        $profile->update($validated);

        return redirect()->route('profil_perusahaan.index')
            ->with('success', 'Profil perusahaan berhasil diperbarui!');
    }
}