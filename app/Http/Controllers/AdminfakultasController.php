<?php

namespace App\Http\Controllers;

use App\Models\AdminfakultasModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class AdminfakultasController extends Controller
{
    public function index()
    {
        // $dpa = AdminfakultasModel::with('dpa')->get();
        $data_kp = DB::table('kp')->get();
        return view('Fakultas/data_pengajuan', [
            'data_kp' => $data_kp,
            // 'dpa' => $dpa,
        ]);
    }
    public function showProfile()
    {
        $profil_fakultas = DB::table('fakultas')->get();
        return view('Fakultas/profil', ['profil_fakultas' => $profil_fakultas]);
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
        
        $data = [
                'nomor_surat' => $nomor_surat,
                'nim' => $nim,
                'nama' => $nama,
                'instansi_tujuan' => $instansi_tujuan,
                'prodi' => $prodi,
                'mulai' => $mulai,
                'sampai' => $sampai,
        ];
        // dd($data);
        // $pdf = PDF::loadView('Fakultas/sp', $data);
        return view('/Fakultas/sp')->with('success', 'Berhasil menambahkan');
        // return redirect(../)->with('success', 'Berhasil menambahkann');
    }    
    public function data_acc_surat_permohonan()
    {
        return view('Fakultas/data_acc_surat_permohonan');
    }
    public function create_surat()
    {
        return view('Fakultas/surat');
    }
    // ACC surat pengajuan
    public function approve($id)
    {
        // $data_pengajuan = DB::table('mahasiswa')->where('id', $id)->update(['status_pengajuan' => 'Approved']);
        return redirect('/Fakultas/data_pengajuan')->with('success', 'Berhasil menambahkan');
    }
    // TOlak surat pengajuan
    public function reject($id)
    {
        // Surat::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil menolak');
    }
}

