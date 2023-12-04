@extends('layouts.fakultas_main')
@section('container')
<h1>Data Pengajuan</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Fakultas</li>
        <li class="breadcrumb-item active">Data Pengajuan</li>
    </ol>
    </nav>
        <div class="col-12">
          <div class="card top-selling overflow-auto">
            <div class="card-body pb-0">
              <h5 class="card-title">Fakultas <span>| Today</span></h5>
                <table class="table table-borderless datatable">
                    <thead>
                    <tr>  
                      <!-- <th scope="col">Kode KP</th> -->
                      <th scope="col">NIM</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIP Dosen Wali</th>
                      <th scope="col">id Periode KP</th>
                      <th scope="col">Prodi</th> 
                      <th scope="col">Instansi </th> 
                      <th scope="col">Status</th> 
                      <th scope="col">Approval</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($data_kp as $data)
                    <tr>
                        <td>{{$data->nim_mhs}}</td>
                        <td></td>
                        <td>{{$data->nip_dpa}}</td>
                        <td>{{$data->id_periodeKP}}</td>
                        <td>Prodi</td>
                        <td>{{$data->instansi_kp}}</td>
                        <td><span class="badge bg-success">{{$data->status}}</span></td>
                        <td>
                          <button class="bg-white"><a href="{{ route('Fakultas/acc/approve', ['nim_mhs' => $data->nim_mhs]) }}"><i class="bi bi-check-lg"></i></a></button>
                          <button class="bg-warning"><a href="{{ route('Fakultas/tolak/approve', ['nim_mhs' => $data->nim_mhs]) }}"><i class="bi bi-trash"></i></a></button>
                        </td>
                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
  </section>
  
@endsection