@extends('layouts.prodi')
@section('main')
<div class="pagetitle">
  <h1>Dashboard Prodi</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/prodi/home">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Pengajuan <span>| Belum ditinjau</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-file-earmark-excel"></i>
                </div>
                <div class="ps-3">
                  <h6>145</h6>
                  <a type="button" class="btn btn-primary btn-sm" href="/prodi/spkp-not-reviewed">Tinjau sekarang</a>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Pengajuan <span>| Telah disetujui</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-file-earmark-check-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>132</h6>
                  <a type="button" class="btn btn-primary btn-sm" href="/prodi/spkp-approved">Lihat semuanya</a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Pengajuan Telah Disetujui Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Pengajuan <span>| Seluruh Periode</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-file-earmark-bar-graph-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>1244</h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Customers Card -->
      </div>
    </div><!-- End Left side columns -->

  </div>
</section>
@endsection