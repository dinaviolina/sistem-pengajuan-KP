<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Dosen_wali;
use App\Models\Kerja_praktek;
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

    public function status_pengajuan()
    {
        $title = 'Mahasiswa';
        $mhs = auth('mahasiswa')->user();
        $status = auth('mahasiswa')->user()->statusMahasiswa;
        $dosen_wali = auth('mahasiswa')->user()->dosenWali;
        return view('Mahasiswa.status_pengajuan',compact(['title','mhs','status','dosen_wali']));
    }
    
    public function permohonan()
    {
        $mhs = auth('mahasiswa')->user();
        
        $data = DB::table('kerja_prakteks')->insert([
            'status' => 'menunggu persetujuan DPA',
            'instansi_kp' => null,
            'nim_mhs' => $mhs->id,
            'nip_dpa' =>  $mhs->nip_dpa,
            'id_periodeKP' => 1,
        ]);
        
        if ($data){
            return redirect()->back()->with('success', 'Permohonan Berhasil Diajukan');
        } 
    }

    public function pendataan(Request $request)
    {
        // dd($request->all());
        $mhs = auth('mahasiswa')->user();

        $data = DB::table('kerja_prakteks')
        ->where('nim_mhs', $mhs->id)
        ->update([
            'status' => 'konsultasi dengan DPA',
            'instansi_kp' => $request->instansi_kp,
            'nim_mhs' => $mhs->id,
            'nip_dpa' =>  $mhs->nip_dpa,
            'id_periodeKP' => 1,
        ]);
        
        if ($data){
            return redirect()->back()->with('success', 'Permohonan Berhasil Diajukan Kepada Dosen Wali');
        } else {
            return redirect()->back()->with('error', 'Gagal !!!');
        }
    }

    public function pengantar(Request $request)
    {        
        $mhs = auth('mahasiswa')->user();

        $kode_kp = DB::table('kerja_prakteks')
            ->where('nim_mhs', '=', $mhs->id)
            ->first();

        $data = DB::table('surat_pengantars')
        ->insert([
            'nomor_sutar' => 0,
            'judul_penelitian' => ucwords($request->judul_penelitian),
            'jangka_waktu_penelitian' => $request->jangka_waktu_penelitian,
            'identitas_suratBalasan' => $request->identitas_surat_balasan,
            'kodeKP' => $kode_kp->id,
        ]);

        DB::table('kerja_prakteks')
        ->where('nim_mhs', $mhs->id)
        ->update([
            'status' => 'Telah mengisi data',
        ]);

        if ($data){
            return redirect("/pengajuan")->with('success', 'Permohonan Surat Pengantar Berhasil Diajukan Ke Kaprodi');
        }
    }

    public function pengantar_baru(Request $request)
    {        
        // dd($request->all());
        $mhs = auth('mahasiswa')->user();
        $file = $request->file('surat_pengantar');
    
        if ($file) {
            $fileName = $mhs->id . '.pdf';
            $filePath = public_path('import/assets/surat_pengantar/') . $fileName;
    
            if (file_exists($filePath)) {
                // Hapus file lama sebelum menyimpan file baru
                unlink($filePath);
            }
    
            // Simpan file yang diunggah dengan nama yang sama
            $file->move(public_path('import/assets/surat_pengantar/'), $fileName);
    
            $data = DB::table('kerja_prakteks')
                ->where('mahasiswa_id', $mhs->id)
                ->update([
                    'surat_pengantar' => $fileName,
                    'status_pengajuan_kp' => 'menunggu surat permohonan dari fakultas',
                    'proposal_kp' => null,
                ]);
    
            if ($file) {
                return redirect("/pengajuan")->with('success', 'Surat Pengantar Berhasil Diajukan Kepada Fakultas');
            } else {
                return redirect("/pengajuan")->with('error', 'Gagal mengunggah surat pengantar');
            }
        } else {
            return redirect("/pengajuan")->with('error', 'File surat pengantar tidak ditemukan');
        }
    }
    
}
