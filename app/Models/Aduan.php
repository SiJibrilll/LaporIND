<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'alamat',
        'user_id',
        'kategori_id',
        'sub_kategori_id',
    ];

    protected $table = "aduan";

    // relasi dengan user
    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // relasi dengan kategori

    function kategori() {
        return $this->belongsTo(Kategori::class, 'katgori_id');
    }

    // relasi dengan sub kategori
    function sub_kategori() {
        return $this->belongsTo(sub_kategori::class, 'sub_kategori_id');
    }

    // relasi dengan gambar aduan
    function gambar_aduan() {
        return $this->hasMany(Gambar_aduan::class, 'aduan_id');
    }
}
