<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontaks'; // atau 'contacts' tergantung migrasi kamu

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}