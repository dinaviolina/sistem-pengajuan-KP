<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kelompok 4 |</title>
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
        <span class="d-none d-lg-block">Pengajuan KP</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('import/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2"></span>
              </a><!-- End Profile Iamge Icon -->
              
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6>Admin Fakultas</h6>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="/Fakultas/profil">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="#">
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
            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/Fakultas/profil">
                <i class="bi bi-person"></i>
                <span>Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../Fakultas/surat">
                <i class="bi bi-question-circle"></i>
                <span>Create Pengajuan</span>
                </a>
            </li> 
            <!-- <li class="nav-item"> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../Fakultas/data_pengajuan">
                <i class="bi bi-database "></i>
                <span>Data Pengajuan</span>
                </a>
            </li>
            <li class="nav-item">
                <li class="nav-item">
                <a class="nav-link collapsed" href="/Fakultas/data_acc_surat_permohonan">
                    <i class="bi bi-folder-check"></i>
                    <span>Data Acc Surat Permohonan</span>
                </a>
                </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="/logout">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="/Fakultas/coba">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Coba-coba</span>
              </a>
            </li><!-- End Login Page Nav -->
          </ul>
        </aside><!-- End Sidebar-->
    <main id="main" class="main">
    <div class="container mt-4">
        @yield('container')
    </div>
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
      <a href="https://bootstrapmade.com/">Permodelan Proses Bisnis B</a>
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
