<?php

namespace App\Models;

use App\Models\Kerja_praktek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $guards = [];
    protected $fillable=['id','dosen_wali','nama_mhs','tempat_lahir','tanggal_lahir','jenis_kelamin','angkatan', 'jumlah_sks', 'image','password'];

    public function statusMahasiswa()
    {
        return $this->hasOne(Kerja_praktek::class, 'mahasiswa_id');
    }
}
