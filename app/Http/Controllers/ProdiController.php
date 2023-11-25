<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdiController extends Controller
{
    public function index() {
        return view('prodi.home',[
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

    
    public function logout() {
        
    }
}
