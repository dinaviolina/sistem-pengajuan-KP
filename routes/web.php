<?php

use App\Http\Controllers\AdminfakultasController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
    // return view('Fakultas/surat_permohonan');
});
// Route homepage   
Route::get('/homepage', function () {
    return view('homepage',[
        "title" => "Homepage"
    ]);
    ;
});
//route fakultas
Route::get('/Fakultas/data_acc_surat_permohonan', function () {
    return view('Fakultas/data_acc_surat_permohonan',[
        "title" => "Data Acc Surat Permohonan"
    ]);
});
#route profil fakltas
Route::get('/profil', function () {
    return view('Fakultas/profil',[
        "title" => "Profil Fakultas"
    ]);
});
// Route::get('/Fakultas/data', function(){return view('Fakultas/data_pengajuan',["title"=>"Data Surat"]);});
// data pengajuan
Route::get('/Fakultas/data', [AdminfakultasController::class, 'index']) ;
// data surat pengajuan yang di acc
Route::get('/Fakultas/acc', [AdminfakultasController::class, 'data_acc']) ;
Route::get('/Fakultas/sp', [AdminfakultasController::class, 'generatesurat']);
