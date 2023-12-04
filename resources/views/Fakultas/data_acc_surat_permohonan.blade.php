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
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Nama DPA</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Instansi Tujuan</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Jangka</th>
                    <th scope="col">Preview Docs</th>
                    <!-- <th scope="col">Status Pengajuan</th> -->
                  </tr>
                </thead>
                <tbody>
                @foreach($data_acc as $acc)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$acc->nim_mhs}}</td>
                    <td>{{$acc->nama_mahasiswa}}</td>
                    <td>{{$acc->prodis}}</td>
                    <td>{{$acc->nama_dpa}}</td>
                    <td>{{$acc->nomor_sutar ?: 'Belum Tersedia'}}</td>
                    <td>{{$acc->instansi_kp}}</td>
                    <td>{{$acc->judul_penelitian}}</td>
                    <td>{{$acc->jangka_waktu_penelitian}}</td>
                    <td>
                      <!-- Tambahkan tombol edit pada kolom Nomor Surat -->
                    @if(empty($acc->nomor_sutar))
                        <form method="GET" action="{{ route('Fakultas.edit_surat', $acc->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Create surat</button>
                        </form>
                        @else
                    <a href="{{ route('Fakultas/sp', $acc->nomor_sutar) }}" class="btn btn-primary " target="_blank">Print Surat</a>

                    @endif
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