<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_pengantar extends Model
{
    use HasFactory;

    protected $table = 'surat_pengantars';
    protected $guards = [];
    protected $fillable=['id', 'nomor_sutar', 'judul_penelitian', 'jangka_waktu_penelitian', 'identitas_suratBalasan', 'kodeKP'];
}
