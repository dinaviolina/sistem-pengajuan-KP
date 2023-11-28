<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mpdf\Mpdf;

class AdminfakultasController extends Controller
{
    public function index()
    {
        return view('Fakultas/data_pengajuan');
    }
    public function generatesurat (Request $request)
    {
        $nomor_surat = $request->input('no_surat');
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $instansi_tujuan = $request->input('instansi');
        $prodi = $request->input('prodi');
        $mulai = $request->input('mulai');
        $sampai = $request->input('sampai');
        
        $content = "Surat Pengantar KP\n\n";
        $content .= "No Surat : $nomor_surat\n";
        $content .= "NIM : $nim";
        $content .= "Nama: $nama\n";
        $content .= "Prodi: $prodi\n";
        $content .= "Instansi Tujuan: $instansi_tujuan\n";
        $content .= "Mulai: $mulai\n";
        $content .= "Sampai: $sampai\n";


        dd($nomor_surat);


        // return redirect(../)->with('success', 'Berhasil menambahkann');
    }    
}

