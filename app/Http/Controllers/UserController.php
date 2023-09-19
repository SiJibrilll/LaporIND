<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function redirectIfLoggedIn($auth, $semestinya) {
        if (!$auth->check()) {
            return view($semestinya); // user belum login maka kirim ke halaman semestinya
        }

        if ($auth->user()->hasRole('pelapor')) {
            return redirect('beranda'); // user sudah login dan merupakan pelapor maka kirim ke beranda
        }
    }

    // -- kirim pelapor kehalaman register
    public function register() {
        
        return $this->redirectIfLoggedIn(Auth(), 'register');
    }

    // -- kirim pelapor kehalaman login
    public function login() {
        
        return $this->redirectIfLoggedIn(Auth(), 'login');
    }

    // -- create akun pelapor
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        
        $user = User::Create($validatedData);
        $user->assignRole('pelapor');

        Auth()->login($user);

        return redirect('/beranda');
    }

    // -- login user
    public function authenticate(Request $request) {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
        ]);
        
        if (Auth()->attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect('/beranda');
        }
    }

    // -- logout user
    public function logout(Request $request) {
        Auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
