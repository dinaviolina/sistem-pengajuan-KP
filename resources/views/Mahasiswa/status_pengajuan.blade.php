<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kelompok 4 | {{$title}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('import/assets/img/utm.png') }}">
  <link href="{{ asset('import/assets/img/utm.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
  <link href="{{ asset('import/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
  <link href="{{ asset('import/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('import/assets/img/logo.png') }}" alt="logo utm" style="width: 40px; height: 50px">
        <span class="d-none d-lg-block">SIJUTEK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('import/assets/profile/' . Auth::guard('mahasiswa')->user()->image) }}" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('mahasiswa')->user()->nama_mhs }}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>{{ Auth::guard('mahasiswa')->user()->nama_mhs }}</h6>
                <span>Mahasiswa</span>
              </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/home">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/home">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->
    
      <li class="nav-item">
        <a class="nav-link" href="/pengajuan">
          <i class="bi bi-question-circle"></i>
          <span>Informasi Pengajuan</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Status Pengajuan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Mahasiswa</li>
          <li class="breadcrumb-item active">Status Pengajuan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section class="section profile">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        @if(DB::table('kerja_prakteks')->where('nim_mhs', $mhs->id)->exists())
            <div class="card" style="min-height: 275px">
                <div class="card-body">

                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">

                      @if($status->status == "menunggu persetujuan DPA" || $status->status == "konsultasi dengan DPA")
                      <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 disabled show active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dosen_wali" type="button" role="tab" aria-controls="home" aria-selected="false"><b>Dosen Wali</b></button>
                      </li>
                      @else
                      <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab" data-bs-target="#dosen_wali" type="button" role="tab" aria-controls="home" aria-selected="false">Dosen Wali</button>
                      </li>
                      @endif

                      @if($status->status == "disetujui DPA" || $status->status == "Telah mengisi data" || $status->status == "Disetujui prodi")
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 disabled show active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#kaprodi" type="button" role="tab" aria-controls="profile" aria-selected="false"><b>Kaprodi</b></button>
                        </li>
                      @else
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 disabled" id="profile-tab" data-bs-toggle="tab" data-bs-target="#kaprodi" type="button" role="tab" aria-controls="profile" aria-selected="false">Kaprodi</button>
                        </li>
                      @endif

                      @if($status->status == "Disetujui fakultas")
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 disabled show active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#fakultas" type="button" role="tab" aria-controls="contact" aria-selected="false"><b>Fakultas</b></button>
                        </li>
                      @else
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 disabled" id="contact-tab" data-bs-toggle="tab" data-bs-target="#fakultas" type="button" role="tab" aria-controls="contact" aria-selected="false">Fakultas</button>
                        </li>
                      @endif

                      @if($status->status == "Selesai")
                        <li class="nav-item flex-fill show active" role="presentation">
                            <button class="nav-link w-100 disabled" id="contact-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="contact" aria-selected="false"><b><i class="bx bxs-check-circle"></i></b></button>
                        </li>
                      @else
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 disabled" id="contact-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="bx bxs-check-circle"></i></button>
                        </li>
                      @endif
                    </ul>
                    
                    <div class="tab-content pt-2" id="myTabjustifiedContent">

                      @if($status->status == "menunggu persetujuan DPA")
                          <h5 style="text-align: center; margin: 15px 0px">Form Pendataan Mahasiswa <b>Kerja Praktek</b></h5>  
                          <div class="tab-pane fade show active d-flex align-items-center" style="min-height: 250px;" id="dosen_wali" role="tabpanel" aria-labelledby="home-tab">
                            <form action="/permohonan_pendataan" method="post" class="row g-2 w-100">
                              @csrf
                                  <div class="col-md-3">
                                    <label class="form-label fw-bold">Mahasiswa</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control shadow-none" name="nim_mhs" value="{{ $mhs->nama_mhs }}" readonly>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="form-label fw-bold">Dosen Wali</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control shadow-none" name="nip_dpa" value="{{ $dosen_wali->namaDPA }}" readonly>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="form-label fw-bold">Instansi yang dituju</label>
                                  </div>
                                  <div class="col-md-9">
                                      <input class="form-control shadow-none" type="text" name="instansi_kp" required>
                                  </div>
                                  <div class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                      Submit
                                    </button>
                                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-body">
                                            Apakah anda yakin dengan data yang anda isi?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Periksa Kembali</button>
                                            <button type="submit" class="btn btn-success">submit</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </form>
                            </div>
                        @elseif($status->status == "konsultasi dengan DPA")
                            <div class="tab-pane fade show active" style="min-height: 250px; display: flex; justify-content: center; align-items: center;" id="dosen_wali" role="tabpanel" aria-labelledby="home-tab">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <h1 style="text-align: center; margin-left: 25px"> {{ $status->status }} </h1>
                            </div>
                            <p style="text-align: center"><b style="color: red">Note</b> Silahkan menemui dosen wali untuk melakukan konsultasi</p>
                        @elseif($status->status == "disetujui DPA")
                          <h5 style="text-align: center; margin: 15px 0px">Form Pengajuan Surat Pengantar</h5>  
                          <div class="tab-pane fade show active d-flex align-items-center" style="min-height: 250px;" id="dosen_wali" role="tabpanel" aria-labelledby="home-tab">
                            <form action="/permohonan_pengantar" method="post" class="row g-2 w-100">
                              @csrf
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Judul Penelitian</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control shadow-none" type="text" name="judul_penelitian" required>
                                </div>
                                <div class="col-md-3">
                                  <label class="form-label fw-bold">Jangka Waktu Penelitian (Hari)</label>
                                </div>
                                <div class="col-md-9">
                                  <input class="form-control shadow-none" type="number" name="jangka_waktu_penelitian" required>
                                </div>
                                <div class="col-md-3">
                                  <label class="form-label fw-bold">Identitas Surat Balasan</label>
                                </div>
                                <div class="col-md-9">
                                  <input class="form-control shadow-none" type="text" placeholder="ketik - jika tidak ada" name="identitas_surat_balasan" required>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                    Submit
                                  </button>
                                  <div class="modal fade" id="verticalycentered" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          Apakah anda yakin dengan data yang anda isi?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Periksa Kembali</button>
                                          <button type="submit" class="btn btn-success">submit</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                          </div>
                        @endif
                        @if($status->status == "Telah mengisi data")
                          <div class="tab-pane fade show active" style="min-height: 250px; display: flex; justify-content: center; align-items: center;"  id="kaprodi" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="spinner-border" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                            <h1 style="text-align: center; margin-left: 25px"> Menunggu Persetujuan Kaprodi </h1>
                          </div>
                        @elseif($status->status == "Disetujui prodi")
                          <div class="tab-pane fade show active" style="min-height: 250px; display: flex; justify-content: center; align-items: center;"  id="kaprodi" role="tabpanel" aria-labelledby="profile-tab">
                            <h1 style="text-align: center; margin-left: 25px"> Surat Permohonan Telah Disetujui Kaprodi </h1>
                          </div>
                          <p style="text-align: center"><b style="color: red">Note!</b> Menunggu tanda tangan koorinator KP ...</p>
                        @endif

                        @if($status->status == "Disetujui fakultas")
                        <div class="tab-pane fade show active" style="min-height: 250px; display: flex; justify-content: center; align-items: center;"  id="kaprodi" role="tabpanel" aria-labelledby="profile-tab">
                          <h1 style="text-align: center; margin-left: 25px"> Surat Permohonan Telah Dicetak </h1>
                        </div>
                        <p style="text-align: center"><b style="color: red">Note!</b> Silahkan datang ke ruang dekanat untuk mengambil surat permohonan </p>
                        @endif
                        
                      @if($status->status == "Selesai")
                        <div class="tab-pane fade show active" style="min-height: 250px; display: flex; justify-content: center; align-items: center;" id="selesai" role="tabpanel" aria-labelledby="contact-tab">
                          <p style="text-align: center"><b style="color: green">Proses Pengajuan Kerja Praktek Selesai. <br> Selamat Melaksanakan Kewajiban Anda di Instansi Tujuan.</b></p>
                        </div>
                      @endif
                    </div><!-- End Default Tabs -->

                </div>
            </div>
        @else
            <div class="card" style="min-height: 250px; display: flex; justify-content: center; align-items: center;">
                <div style="text-align: center;">
                    <h2 style="color: red;">Anda belum mengajukan KP</h2>
                    <a href="/permohonan_kp" type="button" class="btn btn-outline-success">Ajukan</a>
                </div>
            </div>        
        @endif
    </div>
</section>

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('import/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('import/assets/js/main.js')}}"></script>
</body>
</html>