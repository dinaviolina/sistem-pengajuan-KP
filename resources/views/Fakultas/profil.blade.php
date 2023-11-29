@extends('layouts.fakultas_main')
@section('container')
<!-- ======= Sidebar ======= -->
    <h1>Profile</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    </nav>


<section class="section profile">
    <div class="row">
    <div class="col-xl-4">
        <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">       
            <img src="{{ asset('import/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            @foreach ($profil_fakultas as $profil)
            <h2>{{$profil->namaDekan}}</h2>
            <h3>Dekan Fakultas Teknik</h3>
            <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
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
                <h5 class="card-title">Profile Details</h5>
                
                <div class="row">
                <div class="col-lg-3 col-md-4 label ">Kode Fakultas</div>
                <div class="col-lg-9 col-md-8">{{ $profil->kodeFakultas }}</div>
                </div>

                <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama Fakultas</div>
                <div class="col-lg-9 col-md-8">{{ $profil->nama_fakultas }}</div>
                </div>

                <div class="row">
                <div class="col-lg-3 col-md-4 label">NIP</div>
                <div class="col-lg-9 col-md-8">{{ $profil->NIPdekan }} </div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama</div>
                <div class="col-lg-9 col-md-8">{{ $profil->namaDekan }} </div>
                </div>
                
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <!-- Profile Edit Form -->
                <form>
                <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                        <img src="{{ asset('import/assets/img/profile-img.jpg')}}"" alt="Profile">
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kode_fak" class="col-md-4 col-lg-3 col-form-label">Kode Fakultas</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="kode_fak" type="text" class="form-control" id="kode_fak" value="{{ $profil->kodeFakultas }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_fak" class="col-md-4 col-lg-3 col-form-label">Nama Fakultas</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="nama_fak" type="text" class="form-control" id="nama_fak" value="{{ $profil->nama_fakultas }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="nip" type="text" class="form-control" id="nip" value="{{ $profil->NIPdekan }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="nama" type="text" class="form-control" id="nama" value="{{ $profil->namaDekan }}">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form><!-- End Profile Edit Form -->
            </div>
            </div><!-- End Bordered Tabs -->
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>
@endsection