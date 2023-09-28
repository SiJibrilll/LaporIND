<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data_pelapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DataPelaporController extends Controller
{
    function index() {
        return view('lengkapiData');
    }
    

    function create(Request $request) {
        $validated = $request->validate([
                    'nik' => ['required', 'max:255', Rule::unique('data_pelapors', 'nik')],
                    'alamat' => 'required',
                    'no_hp' => 'required|min:6',
                ]);
                
                $validated['user_id'] = Auth()->user()->id;
                Data_pelapor::create($validated);
        return redirect('/beranda');
    }
    
    function show(User $user) {
        if ($user->data_pelapor === null) {
            return view('showDataPelapor', [
                'pesan' => 'user ini belum melengkapi data'
            ]);
        }


        return view('showDataPelapor', [
            'data' => [
                'user' => $user,
                'pelapor' => $user->data_pelapor 
            ]
        ]);
    }
}
