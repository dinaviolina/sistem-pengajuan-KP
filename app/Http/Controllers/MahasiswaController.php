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
    
    public function permohonan()
    {
        $mhs = auth('mahasiswa')->user();
        
        $data = DB::table('kerja_prakteks')->insert([
            'mahasiswa_id' => $mhs->id,
            'pembimbing_1' =>  $mhs->dosen_wali,
            'pembimbing_2' =>  $mhs->dosen_wali,
            'instansi_tujuan' => null,
            'judul_penelitian' => null,
            'waktu_penelitian' => null,
            'surat_pengantar' => null,
            'proposal_kp' => null,
            'status_pengajuan_kp' => 'menunggu acc dosen wali',
        ]);
        
        if ($data){
            return redirect()->back()->with('success', 'Permohonan Berhasil Diajukan Kepada Dosen Wali');
        }
    }
    
    public function status_pengajuan()
    {
        $title = 'Mahasiswa';
        $mhs = auth('mahasiswa')->user();
        $status = auth('mahasiswa')->user()->statusMahasiswa;
        $dosen_wali = auth('mahasiswa')->user()->dosenWali;
        $dosen = Dosen_wali::all();
        return view('Mahasiswa.status_pengajuan',compact(['title','mhs','status','dosen_wali','dosen']));
    }

    public function view_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();

        $mhs = auth('mahasiswa')->user();
        $surat = auth('mahasiswa')->user()->statusMahasiswa;
        $pembimbing = Kerja_praktek::with(['dosen_1', 'dosen_2'])->where('mahasiswa_id', auth('mahasiswa')->id())->get();
        $today = Carbon::now()->format('d F Y');

        // $mpdf->WriteHTML(view('Mahasiswa.surat_pengajuan',compact(['mhs','surat','pembimbing','today'])));
        // // $mpdf->WriteHTML("<h1>Hello world !</h1>");
        // $mpdf->Output();

        return view ("Mahasiswa.surat_pengajuan", compact(["mhs", "surat", "pembimbing", "today"]));
    }

    public function download_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();

        $mhs = auth('mahasiswa')->user();
        $surat = auth('mahasiswa')->user()->statusMahasiswa;
        $pembimbing = Kerja_praktek::with(['dosen_1', 'dosen_2'])->where('mahasiswa_id', auth('mahasiswa')->id())->get();
        $today = Carbon::now()->format('d F Y');

        $mpdf->WriteHTML(view('Mahasiswa.surat_pengajuan',compact(['mhs','surat','pembimbing','today'])));
        $mpdf->Output("download.pdf","D");

    }
    
    public function pengantar(Request $request)
    {        
        $mhs = auth('mahasiswa')->user();

        $data = DB::table('kerja_prakteks')
        ->where('mahasiswa_id', $mhs->id)
        ->update([
            'pembimbing_2' =>  $request->pembimbing_2,
            'instansi_tujuan' => $request->instansi_tujuan,
            'judul_penelitian' => $request->judul_penelitian,
            'waktu_penelitian' => $request->waktu_penelitian,
            'surat_pengantar' => null,
            'proposal_kp' => null,
            'status_pengajuan_kp' => 'menunggu acc kaprodi',
        ]);

        if ($data){
            return redirect("/pengajuan")->with('success', 'Surat Pengantar Berhasil Diajukan Kepada Kaprodi');
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
