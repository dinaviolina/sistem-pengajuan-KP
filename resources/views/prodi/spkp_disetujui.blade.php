@extends('layouts.prodi')
@section('main')
<div class="pagetitle">
  <h1>Data Surat Permohonan Yang Telah Disetujui</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/prodi/template">Home</a></li>
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
          <br>
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>SKS</th>
                <th data-type="date" data-format="DD/MM/YYYY">Tanggal</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>210411100024</td>
                <td>Isnaini Septyana Wanda</td>
                <td>144</td>
                <td>2002/03/09</td>
                <td>
                  <span class="badge text-success">Disetujui</span>
                </td>
              </tr>
              <tr>
                <td>210411100162</td>
                <td>Mohammad Hoiruttamim</td>
                <td>144</td>
                <td>2002/01/08</td>
                <td>
                  <span class="badge text-success">Disetujui</span>
                </td>
              </tr>  
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection