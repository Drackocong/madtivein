<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class versionn extends Model
{



    use HasFactory;

     // Tentukan jika ada nama tabel khusus atau kolom tertentu

     public $timestamps= false;
     protected $table = 'versionn';
     protected $fillable = ['name'];



}
