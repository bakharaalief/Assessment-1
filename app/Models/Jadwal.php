<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'judul',
        'deskripsi',
        'awal',
        'akhir'
    ];

    public function getMahasiswa()
    {
        return Mahasiswa::find($this->mahasiswa_id);
    }

    public function getDosen()
    {
        return Dosen::find($this->dosen_id);
    }
}
