<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerja_praktek extends Model
{
    use HasFactory;

    protected $table = 'kerja_prakteks';
    protected $guards = [];
    protected $fillable=['id', 'proposal_kp', 'status_pengajuan_kp', 'mahasiswa_id'];
}
