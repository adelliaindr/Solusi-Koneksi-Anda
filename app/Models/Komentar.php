<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars'; // Sesuaikan jika nama tabel Anda berbeda

    protected $fillable = [
        'galeri_id',
        'nama_pengirim',      // atau 'name' tergantung kolom di database Anda
        'isi_komentar',  // atau 'isi' / 'message' tergantung kolom di database Anda
    ];
}
