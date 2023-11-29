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
                      <th scope="col">Kode KP</th>
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
                        <td>{{$data->kodeKP}}</td>
                        <th scope="row"><a href="#"></a></th>
                        <td>{{$data->nim_mhs}}</td>
                        <td></td>
                        <td>{{$data->nip_dpa}}</td>
                        <td>{{$data->id_periodeKP}}</td>
                        <td></td>
                        <td><span class="badge bg-success">{{$data->status}}</span></td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>
                          <button><a href="/acc/">ACC</a></button>
                          <button><a href="surat">ACC</a></button>
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