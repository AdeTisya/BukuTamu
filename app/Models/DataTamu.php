<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTamu extends Model
{
    protected $table = 'data_tamus';

    protected $fillable = [
        'nama',
        'Dari',
        'jenis_kelamin',
        'no_telp',
        'alamat_asal',
        'asal',
        'keperluan',
        'jam_datang',
        'foto',
    ];
}
