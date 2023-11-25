<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;

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
    return view('login');
});

Route::post('/succesLogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);

// ------------------------------------ Mahasiswa
Route::get('/home', function () {
    return view('Mahasiswa/home',[
        "title" => "Mahasiswa"
    ]);
});


// ------------------------------------ Dosen Wali
Route::get('/dpa', function () {
    return view('DPA/home',[
        "title" => "DPA"
    ]);
});


// --------------Prodi
Route::get('/prodi/home', [ProdiController::class, 'index']);
Route::get('/prodi/template', [ProdiController::class, 'template']);
Route::get('/prodi/spkp-not-reviewed', [ProdiController::class, 'spkp_not_reviewed']);
Route::get('/prodi/spkp-not-reviewed/approve/{id}', [ProdiController::class, 'spkp_approve']);
Route::get('/prodi/spkp-approved', [ProdiController::class, 'spkp_approved']);
Route::get('/prodi/profile', [ProdiController::class, 'profile']);
Route::post('/prodi/edit-profile/{id}', [ProdiController::class, 'editProfile']);

//---------------Prodi Template
Route::get('/prodi/users-profile', [ProdiController::class, 'usersProfile']);
Route::get('/prodi/pages-faq', [ProdiController::class, 'pagesFaq']);
Route::get('/prodi/pages-contact', [ProdiController::class, 'pagesContact']);
Route::get('/prodi/pages-register', [ProdiController::class, 'pagesRegister']);
Route::get('/prodi/pages-login', [ProdiController::class, 'pagesLogin']);
Route::get('/prodi/pages-error-404', [ProdiController::class, 'pagesError404']);
Route::get('/prodi/pages-blank', [ProdiController::class, 'pagesBlank']);
Route::get('/prodi/components-alerts', [ProdiController::class, 'componentsAlerts']);
Route::get('/prodi/components-accordion', [ProdiController::class, 'componentsAccordion']);
Route::get('/prodi/components-badges', [ProdiController::class, 'componentsBadges']);
Route::get('/prodi/components-breadcrumbs', [ProdiController::class, 'componentsBreadcrumbs']);
Route::get('/prodi/components-buttons', [ProdiController::class, 'componentsButtons']);
Route::get('/prodi/components-cards', [ProdiController::class, 'componentsCards']);
Route::get('/prodi/components-carousel', [ProdiController::class, 'componentsCarousel']);
Route::get('/prodi/components-list-group', [ProdiController::class, 'componentsListGroup']);
Route::get('/prodi/components-modal', [ProdiController::class, 'componentsModal']);
Route::get('/prodi/components-tabs', [ProdiController::class, 'componentsTabs']);
Route::get('/prodi/components-pagination', [ProdiController::class, 'componentsPagination']);
Route::get('/prodi/components-progress', [ProdiController::class, 'componentsProgress']);
Route::get('/prodi/components-spinners', [ProdiController::class, 'componentsSpinners']);
Route::get('/prodi/components-tooltips', [ProdiController::class, 'componentsTooltips']);
Route::get('/prodi/forms-elements', [ProdiController::class, 'formsElements']);
Route::get('/prodi/forms-layouts', [ProdiController::class, 'formsLayouts']);
Route::get('/prodi/forms-editors', [ProdiController::class, 'formsEditors']);
Route::get('/prodi/forms-validation', [ProdiController::class, 'formsValidation']);
Route::get('/prodi/tables-general', [ProdiController::class, 'tablesGeneral']);
Route::get('/prodi/tables-data', [ProdiController::class, 'tablesData']);
Route::get('/prodi/charts-chartjs', [ProdiController::class, 'chartsChartjs']);
Route::get('/prodi/charts-apexcharts', [ProdiController::class, 'chartsApexcharts']);
Route::get('/prodi/charts-echarts', [ProdiController::class, 'chartsEcharts']);
Route::get('/prodi/icons-bootstrap', [ProdiController::class, 'iconsBootstrap']);
Route::get('/prodi/icons-remix', [ProdiController::class, 'iconsRemix']);
Route::get('/prodi/icons-boxicons', [ProdiController::class, 'iconsBoxicons']);


// ------------------------------------ Fakultas
Route::get('/fakultas', function () {
    return view('Fakultas/surat_permohonan',[
        "title" => "Fakultas"
    ]);
});


// ------------------------------------ Admin
Route::get('/admin', function () {
    return view('Admin/home',[
        "title" => "Admin"
    ]);
    ;
});