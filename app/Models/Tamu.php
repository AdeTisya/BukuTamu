<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $fillable = [
        'nama', 
        'Dari', 
        'jam_datang', 
        'alamat_asal', 
        'asal',
        'no_telp', 
        'jenis_kelamin', 
        'keperluan', 
        'foto'
    ];
}