<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $table = 'keterangans'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'title',
        'description',
        'jenis_keterangan',
        'file_path', // Jika kamu menyimpan file
    ];
}
