<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProdiController extends Controller
{
    protected $get_periode;

    public function __construct()
    {
        $this->get_periode = DB::table('periode_kps')
            ->select('*')
            ->orderBy('id', 'desc')
            ->first();
    }
    // --------------Prodi
    public function index() {

        $data_spkp_not_reviewed = DB::table('kerja_prakteks')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->where('mahasiswas.kodeProdi', '=', Auth::guard('prodi')->user()->id)
        ->where('status', '=', 'Telah mengisi data')
        ->where('kerja_prakteks.id_periodeKP', '=', $this->get_periode->id)
        ->count(); 

        $data_spkp_approved = DB::table('kerja_prakteks')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('prodis', 'prodis.id', '=', 'mahasiswas.kodeProdi')
        ->where('kerja_prakteks.id_periodeKP', '=', $this->get_periode->id)
        ->where('prodis.id', '=', Auth::guard('prodi')->user()->id)
        ->where(function ($query) {
            $query->where('status', '=', 'Disetujui prodi')
                ->orWhere('status', '=', 'Disetujui fakultas')
                ->orWhere('status', '=', 'Selesai');
            })
        ->count();

        $data_spkp= DB::table('kerja_prakteks')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('prodis', 'prodis.id', '=', 'mahasiswas.kodeProdi')
        ->where('prodis.id', '=', Auth::guard('prodi')->user()->id)
        ->where('kerja_prakteks.id_periodeKP', '=', $this->get_periode->id)
        ->where(function ($query) {
            $query->where('status', '=', 'Telah mengisi data')
                ->orWhere('status', '=', 'Disetujui prodi')
                ->orWhere('status', '=', 'Disetujui fakultas')
                ->orWhere('status', '=', 'Selesai');
            })
        ->count();

        return view('prodi.home',['title' => "Dashboard Prodi",'prodi' => Auth::guard('prodi')->user(), 'spkp_not_reviewed' => $data_spkp_not_reviewed, 'spkp_approved' => $data_spkp_approved, 'spkp' => $data_spkp, 'periode' => $this->get_periode]);
    }

    public function spkp_not_reviewed() {
        $data_spkp = DB::table('kerja_prakteks')
        ->select('*')
        ->join('periode_kps', 'kerja_prakteks.id_periodeKP', '=', 'periode_kps.id')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->where('mahasiswas.kodeProdi', '=', Auth::guard('prodi')->user()->id)
        ->where('status', '=', 'Telah mengisi data')
        ->where('kerja_prakteks.id_periodeKP', '=', $this->get_periode->id)
        ->get();

        return view('prodi.spkp_belum-ditinjau',['title' => "Daftar SPKP Belum Ditinjau",'prodi' => Auth::guard('prodi')->user(), 'spkps' => $data_spkp, 'periode' => $this->get_periode]);
    }

    public function spkp_review($nim) {
        $data_kp = DB::table('kerja_prakteks')
        ->select('*')
        ->join('periode_kps', 'kerja_prakteks.id_periodeKP', '=', 'periode_kps.id')
        ->join('surat_pengantars', 'surat_pengantars.kodeKP', '=', 'kerja_prakteks.id')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('prodis', 'prodis.id', '=', 'mahasiswas.kodeProdi')
        ->where('kerja_prakteks.nim_mhs', '=', $nim)
        ->first();

        return view('prodi.spkp_review',['title' => "Tinjau SPKP",'prodi' => Auth::guard('prodi')->user(), 'kp' => $data_kp]);
    }

    public function spkp_review_approve($id) {
        DB::table('mahasiswas')
        ->join('kerja_prakteks', 'mahasiswas.id', '=', 'kerja_prakteks.nim_mhs')
        ->where('kerja_prakteks.nim_mhs', $id)
        ->update(['status' => "Disetujui prodi"]);

        return redirect('/prodi/spkp/not-reviewed');
    }

    public function spkp_review_reject($id) {
        DB::table('mahasiswas')
        ->join('kerja_prakteks', 'mahasiswas.id', '=', 'kerja_prakteks.nim_mhs')
        ->where('kerja_prakteks.nim_mhs', $id)
        ->delete();

        return redirect('/prodi/spkp/not-reviewed');
    }

    public function spkp_approved() {
        $data_spkp = DB::table('kerja_prakteks')
        ->select('*')
        ->join('periode_kps', 'kerja_prakteks.id_periodeKP', '=', 'periode_kps.id')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('prodis', 'prodis.id', '=', 'mahasiswas.kodeProdi')
        ->where('kerja_prakteks.id_periodeKP', '=', $this->get_periode->id)
        ->where('prodis.id', '=', Auth::guard('prodi')->user()->id)
        ->where(function ($query) {
            $query->where('status', '=', 'Disetujui prodi')
                ->orWhere('status', '=', 'Disetujui fakultas')
                ->orWhere('status', '=', 'Selesai');
            })
        ->get();

        return view('prodi.spkp_disetujui',['title' => "Daftar SPKP Disetujui",'prodi' => Auth::guard('prodi')->user(), 'spkps' => $data_spkp, 'periode' => $this->get_periode]);
    }

    public function spkp_approved_detail($nim_mhs) {
        $data_kp = DB::table('kerja_prakteks')
        ->select('*')
        ->join('periode_kps', 'kerja_prakteks.id_periodeKP', '=', 'periode_kps.id')
        ->join('surat_pengantars', 'surat_pengantars.kodeKP', '=', 'kerja_prakteks.id')
        ->join('mahasiswas', 'kerja_prakteks.nim_mhs', '=', 'mahasiswas.id')
        ->join('prodis', 'prodis.id', '=', 'mahasiswas.kodeProdi')
        ->where('kerja_prakteks.nim_mhs', '=', $nim_mhs)
        ->first();

        return view('prodi.spkp_detail',['title' => "Detil SPKP",'prodi' => Auth::guard('prodi')->user(), 'kp' => $data_kp]);
    }
    
    public function profile() {
        return view('prodi.profile',['title' => "Profil Prodi",'prodi' => Auth::guard('prodi')->user(),]);
    }
    
    public function edit_profile(Request $request, $id) {
        $data = $request->except(['_token']);

        if ($request->file('foto_kaprodi')) {
            $file = $request->file('foto_kaprodi');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke direktori yang diinginkan
            $file->move(public_path('prodi/img/profil'), $fileName);

            // Simpan path relatif gambar ke dalam $data
            $data['foto_kaprodi'] = $fileName;
        }

        DB::table('prodis')
            ->where('id', $id)
            ->update($data);

        return redirect('/prodi/profile');
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
