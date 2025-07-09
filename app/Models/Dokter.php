<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'nama',
        'spesialis',
        'no_hp',
    ];

    public function jadwal()
    {
        return $this->hasMany(JadwalDokter::class);
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
