<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar_instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'data_instansi_id',
    ];

}
