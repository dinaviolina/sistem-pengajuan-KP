<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodekp extends Model
{
    use HasFactory;

    protected $table = 'periode_kps';
    protected $guards = [];
    protected $fillable=['id', 'semester', 'tahunMulai', 'tahunAkhir'];
}
