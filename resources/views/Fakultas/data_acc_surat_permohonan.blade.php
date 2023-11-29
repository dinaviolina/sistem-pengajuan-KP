@extends('layouts.fakultas_main')
@section('container')
<h1>Surat Permohonan</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Fakultas</li>
        <li class="breadcrumb-item active">Data ACC</li>
    </ol>
    </nav>
        <div class="col-12">
          <div class="card top-selling overflow-auto">
            <div class="card-body pb-0">
              <h5 class="card-title">Fakultas <span>| Today</span></h5>
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Preview Surat</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Instansi Tujuan</th>
                    <th scope="col">Status Pengajuan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <td><a href="#" class="text-primary fw-bold"></a></td>
                    <td>$64</td>
                    <td class="fw-bold">124</td>
                    <td>$5,828</td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
  </section>
  <button> <a href="surat">ACC</a></button>
  <button> <a href="surat">Tolak</a></button>
@endsection