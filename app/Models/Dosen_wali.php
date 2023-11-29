<?php

namespace App\Models;

use App\Models\Kerja_praktek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DPA extends Authenticatable
{
    use HasFactory;

    protected $table = 'dpa';
    protected $guards = [];
    protected $fillable=['id', 'password', 'namaDPA', 'kodeProdi'];

    // public function dosen()
    // {
    //     return $this->hasOne(Kerja_praktek::class, ['pembimbing_1', 'pembimbing_2']);
    // }
}
