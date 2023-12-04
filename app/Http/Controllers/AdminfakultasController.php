<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AdminfakultasModel;   
use App\Models\Mahasiswa;
use App\Models\Surat_pengantar;
use App\Models\Kerja_praktek;


class AdminfakultasController extends Controller
{
    public function index()
    {
        // $dpa = AdminfakultasModel::with('dosen_walis')->get();
        $data_kp = DB::table('kerja_prakteks')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('periode_kps', 'kerja_prakteks.id_periodeKP', '=', 'periode_kps.id')
        ->select('kerja_prakteks.*',
                'mahasiswas.nama_mhs as nama_mhs',
                'periode_kps.semester as periode')
        ->get();
        
        return view('Fakultas/data_pengajuan', [
            'data_kp' => $data_kp,
            // 'dosen_walis' => $dpa,
        ]);
    }
    public function approved($nim_mhs){
        $kp = DB::table('kerja_prakteks')
        ->where('nim_mhs', $nim_mhs)
        ->update(['status' => 'Disetujui fakultas']);
        if (!$kp) {
            return redirect()->back()->with('error', 'KP record not found');
        }
        if ($kp) {
            // Redirect back with a success message
            return redirect()->back()->with('success', 'KP record approved');
        } else {
        // Redirect back with a success message
        return redirect()->back()->with('success', 'KP record approved');
    }
}
    public function tolak($kodeKP){
        $kp = DB::table('kerja_prakteks')->where('kodeKP', $kodeKP)->update(['status' => 'Ditolak']);
        // $kp = DB::table('kerja_prakteks')->where('kodeKP', $kodeKP)->first);
        if (!$kp) {
            return redirect()->back()->with('error', 'KP record not found');
        }
        else{
            return redirect()->back()->with('success', 'KP record rejected');
        }
    }
    public function showProfile()
    {
        $profil_fakultas = DB::table('fakultas')->get();
        return view('Fakultas/profil', ['profil_fakultas' => $profil_fakultas]);
    } 
    public function generatesurat (Request $request)
    {
        return view('/Fakultas/sp')->with('success', 'Berhasil menambahkan');
        // return redirect(../)->with('success', 'Berhasil menambahkann');
    }    
    public function data_acc_surat_permohonan()
    {
        $data_acc = DB::table('kerja_prakteks')
        ->where('status', 'Disetujui fakultas')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('dosen_walis','mahasiswas.nip_dpa', '=', 'dosen_walis.id')
        ->join('prodis', 'mahasiswas.kodeProdi', '=', 'prodis.id')
        ->join('surat_pengantars', 'kerja_prakteks.id', '=', 'surat_pengantars.kodeKP')
        ->select(
            'kerja_prakteks.*',
            'mahasiswas.nama_mhs as nama_mahasiswa',
            'mahasiswas.kodeProdi as prodis',
            'dosen_walis.namaDPA as nama_dpa',
            'prodis.namaProdi as prodis',
            'surat_pengantars.nomor_sutar as nomor_sutar',
            'surat_pengantars.judul_penelitian as judul_penelitian',
            'surat_pengantars.jangka_waktu_penelitian as jangka_waktu_penelitian'
            )
        ->get();
        // dd($data_acc);
        return view('Fakultas/data_acc_surat_permohonan',
        [
            'data_acc' => $data_acc,
        ]);
        
    }
    // ACC surat pengajuan
    public function approve($id)
    {
        // $data_pengajuan = DB::table('mahasiswas)->where('id', $id)->update(['status_pengajuan' => 'Approved']);
        return redirect('/Fakultas/data_pengajuan')->with('success', 'Berhasil menambahkan');
    }
    // TOlak surat pengajuan
    public function reject($id)
    {
        return redirect()->back()->with('success', 'Berhasil menolak');
    }
    public function surat()
    {
        $data_surat = DB::table('surat_pengantars')
        ->join('kerja_prakteks', 'surat_pengantars.kodeKP', '=', 'kerja_prakteks.id')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('prodis', 'mahasiswas.kodeProdi', '=', 'prodis.id')
        ->select('surat_pengantars.nomor_sutar as nomor_sutar',
                'kerja_prakteks.instansi_kp as instansi',
                'mahasiswas.id as nim_mhs',
                'mahasiswas.nama_mhs as nama_mhs',
                'prodis.namaProdi as namaProdi')
        ->first() ;
        return view('/Fakultas/sp',['data_surat' => $data_surat]);
    }
    public function editSurat($id)
        {
            // Ambil data berdasarkan id
            $data = Surat_pengantar::find($id);
            // Tampilkan formulir edit dengan data yang sudah ada
            return view('Fakultas.form_edit_surat', compact('data'));
        }
        
        public function updateSurat(Request $request, $id)
        {
            // Validasi dan proses penyimpanan nomor surat
            $request->validate([
                'nomor_sutar' => 'required',
            ]);
            $data = Surat_pengantar::find($id); // Ganti dengan model yang sesuai
            $data->nomor_sutar = $request->input('nomor_sutar');
            $data->save();
            return redirect()->back()->with('success', 'Nomor surat berhasil diupdate.');
        }
    public function downloadpdf(){
        $pdf = PDF::loadView('Fakultas/sp')->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('surat_pengantar.pdf');
    }
}