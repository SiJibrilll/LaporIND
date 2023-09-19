<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserPelaporController extends Controller
{
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

        return redirect('/');
    }

    // -- kirim user pelapor ke beranda
    public function beranda(Request $request) {
        if (Auth()->user()->hasRole('pelapor')) {
            return view('beranda');
        }

        return redirect('/');
    }
}
