<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen_wali extends Authenticatable
{
    use HasFactory;

    protected $table = 'dosen_walis';
    protected $guards = [];
    protected $fillable=['id', 'password'];
}
