<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Tentukan jika ada nama tabel khusus atau kolom tertentu
    protected $fillable = ['name', 'description', 'logo'];
}
