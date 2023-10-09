<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // -- kirim pelapor ke google sso
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // -- create atau login user
    public function callback()
    {
        DB::transaction(function () {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate([
                'email' => $googleUser->email
            ], [
                'username' => $googleUser->name,
                'email' => $googleUser->email,
                'image' => $googleUser->avatar,
                'oAuth_id' => $googleUser->token,
                'oAuth_type' => 'google'
            ]);

            $user->assignRole('pelapor');
            Auth()->login($user, true);
        });

        return redirect('/beranda',);
    }
}
