<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Fakultas extends Authenticatable 
{
    use HasFactory;

    protected $table = 'fakultas';
    protected $guards = [];
    protected $fillable=['kodeFakultas', 'password', 'nama_fakultas', 'NIPdekan', 'namaDekan'];
}
