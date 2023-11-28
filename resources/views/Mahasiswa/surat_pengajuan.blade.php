<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pengantar</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        } .card {
            border: 1px solid black;
            margin: 50px;
        } .card-body {
            margin: 15px;
            min-height: 80px;
        } .kop_surat {
            display: flex;
        } h2 {
            text-align: center;
            font-weight: bolder;
        } table, tr, td {
           padding: 5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="kop_surat">
                <div class="logo" style="margin: 10px 15px 0px;">
                    <img src="{{ asset("import/assets/img/logo.png") }}" alt="Logo" width="75px">
                </div>
                <div>
                     <h5> DEPARTEMEN PENDIDIKAN NASIONAL <br> UNIVERSITAS TRUNOJOYO <br> FAKULTAS TEKNIK </h5>    
                </div>
            </div>
            <hr>
            <p style="font-size: 10px;">Sekretariat : Kampus Unijoyo PO Box 2 Telang Kamal Telp 031 3011147 Fax. 031 3011506</p>
            <hr>
        
            <h2>FORM PENGAJUAN SURAT PENGANTAR</h2>
            <div style="justify-content: center; align-items:center; display:flex;">
                <table style="width: 90%;">
                    <tr>
                        <td style="width: 250px">Nama</td>
                        <td>:</td>
                        <td>{{ $surat->mahasiswa->nama_mhs }}</td>
                    </tr>
                    <tr>
                        <td>NPM</td>
                        <td>:</td>
                        <td>{{ $surat->mahasiswa_id }}</td>
                    </tr>
                    <tr>
                        <td>Dosen Pembimbing</td>
                        <td>:</td>
                        <td>
                            @foreach ($pembimbing as $item) 
                            1. {{ $item->dosen_1->id }} 
                            <br>
                            2. {{ $item->dosen_2->id }}
                            @endforeach
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Surat Pengantar</td>
                        <td>:</td>
                        <td>Pengantar PKL</td>
                    </tr>
                    <tr>
                        <td>Instansi Perusahaan</td>
                        <td>:</td>
                        <td>{{ $surat->instansi_tujuan }}</td>
                    </tr>
                    <tr>
                        <td>Judul Penelitian</td>
                        <td>:</td>
                        <td>{{ $surat->judul_penelitian }}</td>
                    </tr>
                    <tr>
                        <td>Jangka Waktu Penelitian</td>
                        <td>:</td>
                        <td>{{ $surat->waktu_penelitian }} hari</td>
                    </tr>
                </table>
            </div>

            <br>
            <p style="text-align: center">
                Bangkalan, {{ $today }}
            </p>
            <p style="text-align: center"><b> Menyetujui </b></p>

            <div style="justify-content: center; align-items:center; display:flex;">
                <table style="width: 90%;">
                    <tr>
                        <td style="width: 225px; text-align:center;">
                             Koordinator KP
                        </td>
                        <td></td>
                        <td style="width: 225px; text-align:center;">
                            Pemohon
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 75px"></td>
                        <td style="height: 75px"></td>
                        <td style="height: 75px"></td>
                    </tr>
                    <tr style="text-align: center">
                        <td>
                            ( Bu Fika )
                            <hr>
                            NIP. 111111111111111111
                        </td>
                        <td></td>
                        <td>
                            ( {{ $surat->mahasiswa->nama_mhs }} )
                            <hr>
                            {{ $surat->mahasiswa_id }}
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>