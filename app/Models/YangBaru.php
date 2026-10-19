<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YangBaru extends Model
{
    use HasFactory;

    protected $table = 'yang_baru'; //nama tabel di database
    protected $primaryKey = 'id_penggunabaru'; //primary key di phpmyadmin

    protected $fillable = [
        'nama_penggunabaru',
        'jenis_kelamin',
        'tanggal',
        'alamat'
    ];
}
