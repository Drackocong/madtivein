<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{

    use HasFactory;

    protected $table = 'Keterangans'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'title',
        'description',

    ];
}
