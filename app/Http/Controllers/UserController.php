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
    // -- lihat list user
    function index()
    {
        $users = User::role('pelapor')->get();
        return view('usersList', [
            'users' => $users
        ]);
    }

    //TODO rapihin controller

    // -- kirim pelapor kehalaman login
    public function login()
    {
        return view('login');
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


    // -- tampilkan data user (halaman profil)
    function show()
    {
        $user = User::find(Auth()->user()->id);

        // -- kalau user belum melengkapi data, tampilkan data akun saja
        if ($user->data_pelapor === null) {
            return view('pelapor.profil', ['data' => ['user' => $user]]);
        }

        // -- kalau sudah, tampilkan datanya
        return view('pelapor.profil', ['data' => ['user' => $user,'pelapor' => $user->data_pelapor]]);
    }

    
    // -- kirim user ke halaman edit profil
    function edit()
    {
        return view('pelapor.editProfil', ['user' => User::find(Auth()->user()->id)]);
    }

    // -- ubah data profil user
    function update(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required'],
        ]);


        $user = User::find(Auth()->user()->id);

        $user->update($validatedData);

        return redirect('/users/profil');
    }

    // -- logout user
    public function logout(Request $request)
    {
        Auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }    
}
