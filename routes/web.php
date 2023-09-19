<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPelaporController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingPage');
});


// kirim user pelapor ke halaman register
Route::get('/register', [UserController::class, 'register']);

// kirim user pelapor ke halaman login
Route::get('login', [UserController::class, 'login'])->name('login');


// create user pelapor
Route::post('/userPelapor/create', [UserController::class, 'create']);

// masukan user ke aplikasi
Route::post('/authenticate', [UserController::class, 'authenticate']);

// logout user pelapor
Route::post('/logout', [UserController::class, 'logout']);


// kirim user pelapor ke beranda
Route::get('/beranda', [UserPelaporController::class, 'beranda'])->middleware('auth');
