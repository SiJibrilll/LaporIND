<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\DataPelaporController;
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


// -- kirim user pelapor ke halaman login
Route::get('login', [UserController::class, 'login'])->name('login');


// -- SSO sign in
Route::get('/auth/redirect', [UserController::class, 'redirectToGoogle']);

// -- register atau login user
Route::get('/auth/google/callback', [UserController::class, 'create']);


// -- login manual user ke aplikasi
Route::post('/authenticate', [UserController::class, 'authenticate']);


// === harus login dulu
Route::group(['middleware' => ['auth']], function () {

    // -- logout user pelapor
    Route::post('/logout', [UserController::class, 'logout']);
});


// === harus punya role pelapor
Route::group(['middleware' => ['role:pelapor']], function () {

    // -- kirim user ke halaman profil
    Route::get('/users/profil', [UserController::class, 'show']);

    // -- kirim user ke halaman edit profil
    Route::get('/users/edit', [UserController::class, 'edit']);

    // -- ubah profil pengguna
    Route::put('/users/update', [UserController::class, 'update']);

    // kirim user pelapor ke beranda
    Route::get('/beranda', [UserPelaporController::class, 'beranda']);

    // -- kirim user ke halaman lengkapi data
    Route::get('/dataPelapor', [DataPelaporController::class, 'index']);

    // -- create data pelapor
    Route::post('/dataPelapor/create', [DataPelaporController::class, 'create']);

    // kirim pelapor ke halaman form aduan
    Route::get('/aduan', [AduanController::class, 'index'])->middleware('dataLengkap');
    
    // -- create aduan
    Route::post('/aduan/create', [AduanController::class, 'create'])->middleware('dataLengkap');
});

// === harus punya role instansi
Route::group(['middleware' => ['role:instansi']], function () {
    // --- testing instansi
    Route::get('/instansi', function () {
        dd('kamu instansi');
    });
});


// === harus punya role admin
Route::group(['middleware' => ['role:admin']], function () {
    // -- admin dashboard
    Route::get('/admin', [AdminController::class, 'index']);

    // -- view list users (testing)
    Route::get('/admin/users/pelapor/list', [UserController::class, 'read']);

    // -- show data pelapor
    Route::get('/dataPelapor/{user}/show', [DataPelaporController::class, 'show']);
});
