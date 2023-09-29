<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
    ];

    function sub_kategori() {
        return $this->hasMany(Sub_kategori::class, 'kategori_id');
    }
}
