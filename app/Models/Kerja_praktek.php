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
    protected $fillable=['id', 'proposal_kp', 'status_pengajuan_kp', 'mahasiswa_id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

    public function dosen_1()
    {
        return $this->belongsTo(Dosen_wali::class, 'pembimbing_1','id');
    }

    public function dosen_2()
    {
        return $this->belongsTo(Dosen_wali::class, 'pembimbing_2', 'id');
    }


}
