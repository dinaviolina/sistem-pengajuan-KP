<?php

namespace App\Models;

use App\Models\Kerja_praktek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $guards = [];
    protected $fillable=['nim_mhs', 'password', 'nama_mhs', 'jumlahSKS', 'nip_dpa', 'kodeProdi', 'tempat_lahir','tanggal_lahir','jenis_kelamin','angkatan', 'jumlah_sks', 'image'];

    public function statusMahasiswa()
    {
        return $this->hasOne(Kerja_praktek::class, 'nim_mhs');
    }

    public function dosenWali()
    {
        return $this->belongsTo(Dosen_wali::class, 'nip_dpa');
    }
}
