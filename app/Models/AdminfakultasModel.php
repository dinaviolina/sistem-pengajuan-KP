<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminfakultasModel extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $primaryKey = 'kodeFakultas';
    protected $fillable = [ 'namaFakultas', 'nip', 'nama'];
    public function dpa()
    {
        return $this->belongsTo(AdminfakultasModel::class, 'nip_dpa', 'nip_dpa');
    }
}

