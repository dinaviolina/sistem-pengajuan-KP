<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kaprodi extends Authenticatable
{
    use HasFactory;

    protected $table = 'kaprodis';
    protected $guards = [];
    protected $fillable=['id', 'password'];
}
