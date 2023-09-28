<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi_aduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'terbaca',
        'user_id',
        'aduan_id',
    ];

    protected $table = "notifikasi_aduan";

    // relasi dengan aduan
    function aduan() {
        return $this->belongsTo(Aduan::class, 'aduan_id');
    }

    // relasi dengan user
    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
