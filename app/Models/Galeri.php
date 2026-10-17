<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'kategori',
        'deskripsi',
        'tanggal',
        'image',
    ];

    // Relasi ke Komentar Galeri
    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'galeri_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'galeri_id');
    }

}
