@extends('layouts.fakultas_main')
@section('container')

<div class="card-tools">
    <div class="card card-info-outline">
        <div class="card-header">
            <div class="card-tools">
                <a href="" class="btn btn-primary">Cetak Surat <i class="bi bi-printer-fill"></i></a>
            
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Permohonan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            color: black;
        }
        .atas{
            margin-top: 20px;
        }
        .atas .left p,
        .atas .right p {
            margin-bottom: 5px;
        }
        .head {
            text-align: center;
            margin-top: 50px;
        }
        .content {
            margin-top: 30px;
            line-height: 1.6;
        }
        .footer {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .footer .right{
            float: right;
        }
        .left {
            float: left;
        }
        .right {
            float: right;
        }
        .nomor , .yth {
            margin-bottom: 3em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head">
            <h5>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</h5>
            <h5>RISET, DAN TEKNOLOGI</h5>
            <h5>UNIVERSITAS TRUNOJOYO MADURA</h5>
            <h5><b>FAKULTAS TEKNIK</b></h5>
            <p>Jl.Raya Telang, PO.Box 2 Kamal, Bangkalan-Madura</p>
            <p>Telp : (031)  3011146, Fax. (031) 03011506</p>
            <p class=""><a href="">www.trunojoyo.ac.id</a></p>
            <h1 class="border-bottom" style="color: black;"></h1>
        </div>
        <div class="content">
        <div class="nomor">
            <p>Nomor : [Nomor Surat]</p>
            <p>Perihal :</p>
        </div>
        <div class="yth" >
            <p>Yth. [Nama Instansi Tujuan]</p>
            <p>Di [Tempat]</p>
        </div>
        
        <p style="text-align: justify;">
            Dengan hormat, dalama rangka memperkenalkan mahasiswa pada dunia kerja sesuai bidang masing-masing
             dan untuk memenuhi syarat sebelum mahasiswa mengerjakan tugas akhir/ 
            skripsi, maka sesuai ketentuan kurikulum diwajibkan melakasanakan kerja praktek.
        </p>
        <p style="text-align: justify;">
            Guna memperlancar kegiatan kerja praktek tersebut, kami mohon perkenan Bapak/Ibu untuk
             memberikan izin kepada mahasiswa kami untuk dapat melaksanakan kerja praktek di tempat Bapak/Ibu.
        </p>

        <p>
            Adapun mahasiswa tersebut adalah :
        </p>
        <table class="table table-borderless border">
                    <thead>
                    <tr>  
                      <td scope="col">No</td>
                      <td scope="col">NIM</td>
                      <td scope="col">Nama</td>
                      <td scope="col">Program Studi</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <th ></th>
                        <td></td>
                        <td></td>
                    </tbody>
                  </table>
        <br>
        <p>
            Demikian, atas perhatian dan bantuan dan kerjasamanya, kami ucapkan terima kasih.
        </p>
    </div>
    <div class="footer">
                <div class="right">
                    <p>Dekan</p>
                    <br>
                    <br>
                    (Faikul Umam)
                    <br>
                    NIP 198301182008121001
                </div>
            </div>
    </div>
</body>
</html>
</div>
    </div>
    
@endsection