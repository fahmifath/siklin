<?php

namespace App\Models;

use App\Models\Resep;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tanggal_kunjungan',
        'keluhan',
        'diagnosa',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }
}
