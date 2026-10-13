<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = [
        'galeri_id',
        'ip_address',
        'user_id',
    ];
}
