<?php

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
Route::get('/fakultas', function () {
    return view('Fakultas/surat_permohonan',[
        "title" => "Fakultas"
    ]);
});