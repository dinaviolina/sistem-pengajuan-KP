@extends('layouts.fakultas_main')
@section('container')

<div class="pagetitle">
<h1>Form Pengantar KP</h1>
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Pengantar KP</li>
    </ol>
</nav>
</div><!-- End Page Title -->
<section class="section">
<div class="row">
    <div class="col-lg-6">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Form Surat Permohonan KP</h5>
        <!-- General Form Elements -->
        <form method="POST" action="{{ url('/Fakultas/sp') }}>
            @csrf
            <div class="row mb-3">
            <label for="no_surat" class="col-sm-2 col-form-label">No Surat</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="no_surat" name="no_surat">
            </div>
            </div>
            <div class="row mb-3">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nim" name="nim">
            </div>
            </div>
            <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            </div>
            <div class="row mb-3">
            <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="prodi" name="prodi">
            </div>
            </div>
            <div class="row mb-3">
                <label for="instansi" class="col-sm-2 col-form-label">Instansi Tujuan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="instansi" name="instansi">
                </div>
            </div>
            <div class="row mb-3">
            <label for="mulai" class="col-sm-2 col-form-label">mulai</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="mulai" name="mulai">
            </div>
            </div>
            <div class="row mb-3">
            <label for="sampai" class="col-sm-2 col-form-label">sampai</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="sampai" name="sampai">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
            </div>
        </form>
        <!-- End General Form Elements -->
        <!-- <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Upload TTD</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="formFile">
        </div>
        </div> -->
    </div>
</div>
</div>
</div>
</section>
@endsection