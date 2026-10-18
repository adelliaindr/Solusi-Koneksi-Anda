<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\StrukturOrganisasi;

class ProfilPerusahaanController extends Controller
{
    // Tambahkan method index ini untuk menangani rute /profil
    public function index()
    {
        $profile = Profile::first();
        $struktur = StrukturOrganisasi::orderBy('urutan', 'asc')->get();

        return view('profil', compact('profile', 'struktur'));
    }
}
