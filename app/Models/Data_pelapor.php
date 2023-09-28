<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_pelapor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'no_hp',
        'alamat',
        'user_id',
    ];

    // relasi dengan user
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
