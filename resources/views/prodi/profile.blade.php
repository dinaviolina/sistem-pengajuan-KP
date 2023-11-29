@extends('layouts.prodi')
@section('main')
<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/prodi/template">Home</a></li>
        <li class="breadcrumb-item">Kaprodi</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('prodi/img/profil/'.$prodi->foto_kaprodi) }}" alt="Profile" class="rounded-circle">
            <h2 class="text-center">{{ $prodi->namaKaprodi }}</h2>
            <br>
            <h3>Kaprodi {{ $prodi->namaProdi }}</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Detil Prodi</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Kode Prodi</div>
                  <div class="col-lg-9 col-md-8">{{ $prodi->kodeProdi }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nama Prodi</div>
                  <div class="col-lg-9 col-md-8">{{ $prodi->namaProdi }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Fakultas</div>
                  <div class="col-lg-9 col-md-8">{{ $prodi->nama_fakultas }}</div>
                </div>


                <h5 class="card-title">Profil Kaprodi</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8">{{ $prodi->namaKaprodi }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">NIP</div>
                  <div class="col-lg-9 col-md-8">{{ $prodi->NIPkaprodi }}</div>
                </div>

              </div>
            </div><!-- End Bordered Tabs -->
            
            <div class="tab-content pt-2">
              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="/prodi/edit-profile/{{ 55201 }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row mb-3">
                    <label for="foto_kaprodi" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="pt-2">
                        <input name="foto_kaprodi" type="file" class="form-control" id="foto_kaprodi">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="namaKaprodi" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="namaKaprodi" type="text" class="form-control" id="namakaprodi" value="{{ $prodi->namaKaprodi }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="NIPkaprodi" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="NIPkaprodi" type="text" class="form-control" id="NIPkaprodi" value="{{ $prodi->NIPkaprodi }}">
                    </div>
                  </div>

                  <br>
                  <div class="text">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>
              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('script')
<script>
  document.addEventListener("DOMContentLoaded", () => {
    echarts.init(document.querySelector("#trafficChart")).setOption({
      tooltip: {
        trigger: 'item'
      },
      legend: {
        top: '5%',
        left: 'center'
      },
      series: [{
        name: 'Access From',
        type: 'pie',
        radius: ['40%', '70%'],
        avoidLabelOverlap: false,
        label: {
          show: false,
          position: 'center'
        },
        emphasis: {
          label: {
            show: true,
            fontSize: '18',
            fontWeight: 'bold'
          }
        },
        labelLine: {
          show: false
        },
        data: [{
            value: 1048,
            name: 'Search Engine'
          },
          {
            value: 735,
            name: 'Direct'
          },
          {
            value: 580,
            name: 'Email'
          },
          {
            value: 484,
            name: 'Union Ads'
          },
          {
            value: 300,
            name: 'Video Ads'
          }
        ]
      }]
    });
  });
</script>
@endsection