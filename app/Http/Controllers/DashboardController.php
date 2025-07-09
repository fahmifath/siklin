<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Kunjungan;
use App\Models\Resep;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {
        $jumlahDokter = Dokter::count();
        $jumlahPasien = Pasien::count();
        $stokMinim = Obat::where('stok', '<', 10)->count();
        $kunjunganHariIni = Kunjungan::whereDate('tanggal_kunjungan', Carbon::today())->count();
        $totalResep = Resep::count();

        return view('dashboard.index', compact(
            'jumlahDokter',
            'jumlahPasien',
            'stokMinim',
            'kunjunganHariIni',
            'totalResep'
        ));
    }
}
