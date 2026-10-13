<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan mass assignment
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}