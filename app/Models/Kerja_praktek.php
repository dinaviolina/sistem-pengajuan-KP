<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\Dosen_wali;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kerja_praktek extends Model
{
    use HasFactory;

    protected $table = 'kerja_prakteks';
    protected $guards = [];
    protected $fillable=['id','status', 'nim_mhs', 'nip_dpa', 'id_periodeKP'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_mhs', 'id');
    }

    public function dosen_1()
    {
        return $this->belongsTo(Dosen_wali::class, 'nip_dpa','id');
    }


}
