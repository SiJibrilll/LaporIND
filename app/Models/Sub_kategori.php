<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_kategori',
        'kategori_id',
    ];

    protected $table = "sub_kategori";

    function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
