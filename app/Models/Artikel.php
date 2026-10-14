<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'title',
        'kategori',
        'tanggal_upload',
        'content',
        'image',
    ];

    protected $casts = [
        'tanggal_upload' => 'date',
        ];
}