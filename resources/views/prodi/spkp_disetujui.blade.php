@extends('layouts.prodi')
@section('main')
<div class="pagetitle">
  <h1>Data Surat Permohonan Yang Telah Disetujui</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/prodi/home">Home</a></li>
      <li class="breadcrumb-item">Surat Permohonan KP</li>
      <li class="breadcrumb-item active">Telah disetujui</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Semester {{ $periode->semester }} {{ $periode->tahunMulai }}/{{ $periode->tahunAkhir }}</h5>
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Periode</th>
                <th>KP</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($spkps as $spkp)
              <tr>
                <td>{{ $spkp->nim_mhs }}</td>
                <td>{{ $spkp->nama_mhs }}</td>
                <td>{{ $spkp->semester }} {{ $spkp->tahunMulai }}/{{ $spkp->tahunAkhir }}</td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="/prodi/spkp/approved/detail/{{ $spkp->nim_mhs }}">Lihat</a>
                </td>
                <td>
                  <span class="badge text-success">Disetujui</span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection