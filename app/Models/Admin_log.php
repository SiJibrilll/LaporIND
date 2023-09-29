<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'pesan',
        'user_id',
    ];

    // relasi dengan user
    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
