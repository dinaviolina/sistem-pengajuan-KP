<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function profil()
    {
        $title = 'Mahasiswa';
        $mhs = auth('mahasiswa')->user();
        $status = auth('mahasiswa')->user()->statusMahasiswa;
        return view('Mahasiswa.home',compact(['title', 'mhs', 'status']));
    }
    
    public function permohonan()
    {
        $mhs = auth('mahasiswa')->user();
        
        $data = DB::table('kerja_prakteks')->insert([
            'status_pengajuan_kp' => 'menunggu acc dosen wali',
            'mahasiswa_id' => $mhs->id
        ]);
        
        if ($data){
            return redirect()->back()->with('success', 'Permohonan Berhasil Diajukan Kepada Dosen Wali');
        }
    }
    
    public function status_pengajuan()
    {
        $title = 'Mahasiswa';
        $mhs = auth('mahasiswa')->user();
        $status = auth('mahasiswa')->user()->statusMahasiswa->status_pengajuan_kp;
        return view('Mahasiswa.status_pengajuan',compact(['title','mhs','status']));
    }
}
