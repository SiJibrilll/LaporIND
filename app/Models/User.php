<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'image',
        'oAuth_id',
        'oAuth_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // relasi dengan data pelapor

    function data_pelapor() {
        return $this->hasOne(Data_pelapor::class, 'user_id');
    }


    // relasi dengan data instansi
    function data_instansi() {
        return $this->hasOne(Data_instansi::class, 'user_id');
    }

    // relasi dengan aduan
    function aduan() {
        return $this->hasMany(Aduan::class, 'user_id');
    }

    // relasi dengan nitifikasi aduan
    function notifikasi_aduan() {
        return $this->hasMany(Notifikasi_aduan::class, 'user_id');
    }

    // relasi dengan admin log
    function admin_log() {
        return $this->hasMany(Admin_log::class, 'user_id');
    }

}
