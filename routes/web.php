<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
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

Route::post('/login', [LoginController::class, 'postLogin']);
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


// --------------Prodi
Route::get('/prodi/home', [ProdiController::class, 'index']);
Route::get('/prodi/spkp/not-reviewed', [ProdiController::class, 'spkp_not_reviewed']);
Route::get('/prodi/spkp/review/{id}', [ProdiController::class, 'spkp_review']);
Route::get('/prodi/spkp/review/approve/{id}', [ProdiController::class, 'spkp_review_approve']);
Route::get('/prodi/spkp/review/reject/{id}', [ProdiController::class, 'spkp_review_reject']);
Route::get('/prodi/spkp/approved', [ProdiController::class, 'spkp_approved']);
Route::get('/prodi/spkp/approved/detail/{id}', [ProdiController::class, 'spkp_approved_detail']);
Route::get('/prodi/profile', [ProdiController::class, 'profile']);
Route::post('/prodi/profile/edit/{id}', [ProdiController::class, 'edit_profile']);
Route::get('/prodi/logout', [ProdiController::class, 'logout']);


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