<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar_aduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'aduan_id',
        'image',
        ];


    // relasi dengan aduan
    function aduan() {
        return $this->belongsTo(Aduan::class, 'aduan_id');
    }
    
}
