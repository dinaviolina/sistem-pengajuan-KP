@extends('layouts.fakultas_main')
@section('container')
<div class="pagetitle">
<h1>Form Input Nomor Surat Pengantar KP</h1>
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

        <div class="card-body mt-4">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

            <!-- Formulir edit surat -->
            <!-- <h5 class="card-title">Form Input Nomor Surat </h5> -->
    <form method="POST" action="{{ route('Fakultas.update_surat', $data->id) }}">
        @csrf
        <div class="row mt-3 mb-3">
            <label for="nomor_sutar" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nomor_sutar" name="nomor_sutar" value="{{ $data->nomor_sutar }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
</div>
</section>
@endsection