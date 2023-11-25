<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $guards = [];
    protected $fillable=['id','dosen_wali','nama_mhs','tempat_lahir','tanggal_lahir','jenis_kelamin','angkatan', 'jumlah_sks', 'image','password'];
}
