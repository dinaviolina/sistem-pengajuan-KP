@extends('layouts.prodi')
@section('main')
<div class="pagetitle">
  <h1>Tinjau Surat Pengajuan Kerja Praktek</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/prodi/home">Home</a></li>
      <li class="breadcrumb-item">spkp-belum-ditinjau</li>
      <li class="breadcrumb-item active">spkp-review</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">Pendataan Kerja Praktek</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama</div>
                <div class="col-lg-9 col-md-8">{{ $kp->nama_mhs }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nim</div>
                <div class="col-lg-9 col-md-8">{{ $kp->nim_mhs }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jumlah SKS</div>
                <div class="col-lg-9 col-md-8">{{ $kp->jumlahSKS }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Tempat/Instansi</div>
                <div class="col-lg-9 col-md-8">{{ $kp->instansi_kp }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Dosen Pembimbing</div>
                <div class="col-lg-9 col-md-8">{{ $kp->nip_dpa }}</div>
              </div>

              <h5 class="card-title">Pengajuan Surat Pengantar</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Judul Penelitian</div>
                <div class="col-lg-9 col-md-8">{{ $kp->judul_penelitian }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jangka Waktu Penelitian</div>
                <div class="col-lg-9 col-md-8">{{ $kp->jangka_waktu_penelitian }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Identitas Surat Balasan</div>
                <div class="col-lg-9 col-md-8">{{ $kp->identitas_suratBalasan }}</div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12 col-md-6 label">
                  <a type="button" class="btn btn-success btn-sm" href="/prodi/spkp/review/approve/{{ $kp->nim_mhs }}">Setujui</a>
                  <a type="button" class="btn btn-danger btn-sm" href="/prodi/spkp/review/reject/{{ $kp->nim_mhs }}">Tolak</a>
                </div>
              </div>

            </div>
          </div><!-- End Bordered Tabs -->
        </div>
      </div>

    </div>

  </div>
</section>
@endsection

