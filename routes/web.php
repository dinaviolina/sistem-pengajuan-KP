<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;

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
    return view('login');
});

Route::post('/succesLogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);

// ------------------------------------ Mahasiswa
Route::get('/home', [MahasiswaController::class, 'profil']);
Route::get('/permohonan_kp', [MahasiswaController::class, 'permohonan']);
Route::get('/pengajuan', [MahasiswaController::class, 'status_pengajuan']);


// ------------------------------------ Dosen Wali
Route::get('/dpa', function () {
    return view('DPA/home',[
        "title" => "DPA"
    ]);
});


// ------------------------------------ Kaprodi
Route::get('/kaprodi', function () {
    return view('Kaprodi/home',[
        "title" => "Kaprodi"
    ]);
});


// ------------------------------------ Fakultas
Route::get('/fakultas', function () {
    return view('Fakultas/surat_permohonan',[
        "title" => "Fakultas"
    ]);
});


// ------------------------------------ Admin
Route::get('/admin', function () {
    return view('Admin/home',[
        "title" => "Admin"
    ]);
    ;
});