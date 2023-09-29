<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_instansi extends Model
{
    use HasFactory;

    protected $fillable = [
    'no_hp',
    'alamat',
    'kota',
    'user_id',
    'kategori_id',
    ];


    // relasi dengan user
    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relasi dengan kategori
    function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // relasi dengan gambar
    function gambar_instansi() {
        return $this->hasMany(Gambar_instansi::class, 'data_instansi_id');
    }
}
