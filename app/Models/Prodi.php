<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $guards = ['kodeProdi'];
}
