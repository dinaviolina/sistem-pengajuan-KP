<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProdiController extends Controller
{
    // --------------Prodi
    public function index() {
        $data_prodi = DB::table('prodi')
        ->select('*')
        ->join('fakultas', 'prodi.kodeFakultas', '=', 'fakultas.kodeFakultas')
        ->where('NIPkaprodi', '=', session('username'))
        ->first();

        $get_periode = DB::table('periodeKP')
        ->select('*')
        ->orderBy('id_periodeKP', 'desc')
        ->first();

        $data_spkp_not_reviewed = DB::table('kp')
        ->join('periodekp', 'kp.id_periodeKP', '=', 'periodeKP.id_periodeKP')
        ->join('mahasiswa', 'kp.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->join('prodi', 'prodi.kodeProdi', '=', 'mahasiswa.kodeProdi')
        ->where('status', '=', 'Telah mengisi data')
        ->where('prodi.kodeProdi', '=', 55201)
        ->where('kp.id_periodeKP', '=', $get_periode->id_periodeKP)
        ->count(); 

        $data_spkp_approved = DB::table('kp')
        ->join('periodeKP', 'kp.id_periodeKP', '=', 'periodeKP.id_periodeKP')
        ->join('mahasiswa', 'kp.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->join('prodi', 'prodi.kodeProdi', '=', 'mahasiswa.kodeProdi')
        ->where('prodi.kodeProdi', '=', 55201)
        ->where('kp.id_periodeKP', '=', $get_periode->id_periodeKP)
        ->where('status', '=', 'Disetujui prodi')
        ->orWhere('status', '=', 'Disetujui fakultas') 
        ->orWhere('status', '=', 'Selesai')
        ->count(); 

        $data_spkp= DB::table('kp')
        ->join('periodeKP', 'kp.id_periodeKP', '=', 'periodeKP.id_periodeKP')
        ->join('mahasiswa', 'kp.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->join('prodi', 'prodi.kodeProdi', '=', 'mahasiswa.kodeProdi')
        ->where('prodi.kodeProdi', '=', 55201)
        ->where('kp.id_periodeKP', '=', $get_periode->id_periodeKP)
        ->Where('status', '=', 'Disetujui fakultas') 
        ->orWhere('status', '=', 'Selesai') 
        ->count();


        return view('prodi.home',['title' => "Dashboard Prodi",'prodi' => $data_prodi, 'spkp_not_reviewed' => $data_spkp_not_reviewed, 'spkp_approved' => $data_spkp_approved, 'spkp' => $data_spkp, 'periode' => $get_periode]);
    }

    public function spkp_not_reviewed() {
        $data_prodi = DB::table('prodi')
        ->select('*')
        ->join('fakultas', 'prodi.kodeFakultas', '=', 'fakultas.kodeFakultas')
        ->where('kodeProdi', '=', 55201)
        ->first();

        $data_spkp = DB::table('kp')
        ->select('*')
        ->join('periodeKP', 'kp.id_periodeKP', '=', 'periodeKP.id_periodeKP')
        ->join('mahasiswa', 'kp.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->where('status', '=', 'Telah mengisi data')
        ->get();

        return view('prodi.spkp_belum-ditinjau',['title' => "Surat Pengajuan KP",'prodi' => $data_prodi, 'spkps' => $data_spkp]);
    }

    public function spkp_review() {
        $data_kp = DB::table('kp')
        ->select('*')
        ->join('periodeKP', 'kp.id_periodeKP', '=', 'periodeKP.id_periodeKP')
        ->join('mahasiswa', 'kp.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->join('surat_pengantar', 'surat_pengantar.kodeKP', '=', 'kp.kodeKP')
        ->where('status_pengajuan_kp', '=', 'Telah mengisi data')
        ->first();

        $data_prodi = DB::table('prodi')
        ->select('*')
        ->join('fakultas', 'prodi.kodeFakultas', '=', 'fakultas.kodeFakultas')
        ->where('kodeProdi', '=', 55201)
        ->first();

        return view('prodi.spkp_review',['title' => "Surat Pengajuan KP",'prodi' => $data_prodi, 'kp' => $data_kp]);
    }

    public function spkp_approved() {
        $data_spkp = DB::table('kp')
        ->select('*')
        ->join('periodeKP', 'kp.id_periodeKP', '=', 'periodeKP.id_periodeKP')
        ->join('mahasiswa', 'kp.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->join('prodi', 'prodi.kodeProdi', '=', 'mahasiswa.kodeProdi')
        ->where('status', '=', 'Disetujui prodi')
        ->orWhere('status', '=', 'Disetujui fakultas')
        ->orWhere('status', '=', 'Selesai')
        ->get();

        $data_prodi = DB::table('prodi')
        ->select('*')
        ->join('fakultas', 'prodi.kodeFakultas', '=', 'fakultas.kodeFakultas')
        ->where('kodeProdi', '=', 55201)
        ->first();

        return view('prodi.spkp_disetujui',['title' => "Surat Pengajuan KP",'prodi' => $data_prodi, 'spkps' => $data_spkp]);
    }

    public function spkp_approve($id) {
        DB::table('mahasiswa')
        ->join('kp', 'mahasiswa.nim_mhs', '=', 'kp.nim_mhs')
        ->where('nim_mhs', $id)
        ->update(['status' => "Disetujui prodi"]);

        return redirect('/prodi/spkp-not-reviewed');
    }

    public function spkp_reject($id) {
        DB::table('mahasiswa')
        ->join('kp', 'mahasiswa.nim_mhs', '=', 'kp.nim_mhs')
        ->where('nim_mhs', $id)
        ->update(['status' => "Belum mengajukan"]);

        return redirect('/prodi/spkp-not-reviewed');
    }

    public function profile() {
        $data_prodi = DB::table('prodi')
        ->select('*')
        ->join('fakultas', 'prodi.kodeFakultas', '=', 'fakultas.kodeFakultas')
        ->where('kodeProdi', '=', 55201)
        ->first();

        return view('prodi.profile',['title' => "Profil Prodi",'prodi' => $data_prodi]);
    }
    
    public function editProfile(Request $request, $id) {
        $data = $request->except(['_token']);

        if ($request->file('foto_kaprodi')) {
            $file = $request->file('foto_kaprodi');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke direktori yang diinginkan
            $file->move(public_path('prodi/img/profil'), $fileName);

            // Simpan path relatif gambar ke dalam $data
            $data['foto_kaprodi'] = $fileName;
        }

        DB::table('prodi')
            ->where('kodeProdi', $id)
            ->update($data);

        return redirect('/prodi/profile');
    }
    

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    //--------------------Prodi Template
    public function template() {
        return view('prodi.index',[
            "title" => "Prodi"
        ]);
    }
    public function usersProfile() {
        return view('prodi.users-profile',[
            "title" => "Prodi"
        ]);
    }
    public function pagesFaq() {
        return view('prodi.pages-faq',[
            "title" => "Prodi"
        ]);
    }
    public function pagesContact() {
        return view('prodi.pages-contact',[
            "title" => "Prodi"
        ]);
    }
    public function pagesRegister() {
        return view('prodi.pages-register',[
            "title" => "Prodi"
        ]);
    }
    public function pagesLogin() {
        return view('prodi.pages-login',[
            "title" => "Prodi"
        ]);
    }
    public function pagesError404() {
        return view('prodi.pages-error-404',[
            "title" => "Prodi"
        ]);
    }
    public function pagesBlank() {
        return view('prodi.pages-blank',[
            "title" => "Prodi"
        ]);
    }
    public function componentsAlerts() {
        return view('prodi.components-alerts',[
            "title" => "Prodi"
        ]);
    }
    public function componentsAccordion() {
        return view('prodi.components-accordion',[
            "title" => "Prodi"
        ]);
    }
    public function componentsBadges() {
        return view('prodi.components-badges',[
            "title" => "Prodi"
        ]);
    }
    public function componentsBreadcrumbs() {
        return view('prodi.components-breadcrumbs',[
            "title" => "Prodi"
        ]);
    }
    public function componentsButtons() {
        return view('prodi.components-buttons',[
            "title" => "Prodi"
        ]);
    }
    public function componentsCards() {
        return view('prodi.components-cards',[
            "title" => "Prodi"
        ]);
    }
    public function componentsCarousel() {
        return view('prodi.components-carousel',[
            "title" => "Prodi"
        ]);
    }
    public function componentsListGroup() {
        return view('prodi.components-list-group',[
            "title" => "Prodi"
        ]);
    }
    public function componentsModal() {
        return view('prodi.components-modal',[
            "title" => "Prodi"
        ]);
    }
    public function componentsTabs() {
        return view('prodi.components-tabs',[
            "title" => "Prodi"
        ]);
    }
    public function componentsPagination() {
        return view('prodi.components-pagination',[
            "title" => "Prodi"
        ]);
    }
    public function componentsProgress() {
        return view('prodi.components-progress',[
            "title" => "Prodi"
        ]);
    }
    public function componentsSpinners() {
        return view('prodi.components-spinners',[
            "title" => "Prodi"
        ]);
    }
    public function componentsTooltips() {
        return view('prodi.components-tooltip',[
            "title" => "Prodi"
        ]);
    }
    public function formsElements() {
        return view('prodi.forms-elements',[
            "title" => "Prodi"
        ]);
    }
    public function formsLayouts() {
        return view('prodi.forms-layouts',[
            "title" => "Prodi"
        ]);
    }
    public function formsEditors() {
        return view('prodi.forms-editors',[
            "title" => "Prodi"
        ]);
    }
    public function formsValidation() {
        return view('prodi.forms-validation',[
            "title" => "Prodi"
        ]);
    }
    public function tablesGeneral() {
        return view('prodi.tables-general',[
            "title" => "Prodi"
        ]);
    }
    public function tablesData() {
        return view('prodi.tables-data',[
            "title" => "Prodi"
        ]);
    }
    public function chartsChartjs() {
        return view('prodi.charts-chartjs',[
            "title" => "Prodi"
        ]);
    }
    public function chartsApexcharts() {
        return view('prodi.charts-apexcharts',[
            "title" => "Prodi"
        ]);
    }
    public function chartsEcharts() {
        return view('prodi.charts-echarts',[
            "title" => "Prodi"
        ]);
    }
    public function iconsBootstrap() {
        return view('prodi.icons-bootstrap',[
            "title" => "Prodi"
        ]);
    }
    public function iconsRemix() {
        return view('prodi.icons-remix',[
            "title" => "Prodi"
        ]);
    }
    public function iconsBoxicons() {
        return view('prodi.icons-boxicons',[
            "title" => "Prodi"
        ]);
    }


}
