<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriPengaduanFactory> */
    use HasFactory;
    protected $guarded=['id'];
}
