<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $guarded = [];

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
