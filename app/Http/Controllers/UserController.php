<?php

namespace App\Http\Controllers;

use App\Models\Data_pelapor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    public function redirectIfLoggedIn($auth, $semestinya)
    {
        if (!$auth->check()) {
            return view($semestinya); // user belum login maka kirim ke halaman semestinya
        }

        if ($auth->user()->hasRole('pelapor')) {
            return redirect('beranda'); // user sudah login dan merupakan pelapor maka kirim ke beranda
        }
    }

    // -- kirim pelapor kehalaman register
    public function register()
    {

        return $this->redirectIfLoggedIn(Auth(), 'register');
    }

    // -- kirim pelapor kehalaman login
    public function login()
    {
        return $this->redirectIfLoggedIn(Auth(), 'login');
    }

    public function redirectToGoogle()
    {
        //dd(Socialite::driver('google')->redirect());
        return Socialite::driver('google')->redirect();
    }

    public function create() {
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

    // -- login user
    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
        ]);

        if (Auth()->attempt($validatedData)) {
            $request->session()->regenerate();
            if (Auth()->user()->hasRole('admin')) {
                return redirect('/admin');
            }
            
            return redirect('/beranda');
        }
    }


    // -- kirim user ke halaman profil
    function show() {
        $user = User::find(Auth()->user()->id);

        if ($user->data_pelapor === null) {
            return view('pelapor.profil', [
                'data' => [
                    'user' => $user
                ]
            ]);
        }

        $dataPelapor = $user->data_pelapor;

        return view('pelapor.profil', [
            'data' => [
                'user' => $user,
                'pelapor' => $dataPelapor
            ]
            ]);
    }

    // -- kirim user ke halaman edit profil
    function edit() {
        return view('pelapor.editProfil', ['user' => User::find(Auth()->user()->id)]);
    }

    // -- ubah data profil user
    function update(Request $request) {
        $validatedData = $request->validate([
            'username' => ['required'],
        ]);
        
        
        $user = User::find(Auth()->user()->id);

        $user->update($validatedData);

        return redirect('/beranda');
    }

    // -- logout user
    public function logout(Request $request)
    {
        Auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    // -- lihat list user
    function read() {
        $users = User::role('pelapor')->get();
        return view('usersList', [
            'users' => $users
        ]);
    }
}
