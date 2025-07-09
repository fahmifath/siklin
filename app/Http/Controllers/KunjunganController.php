<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\NotifikasiKunjungan;
use Illuminate\Support\Facades\Mail;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungan = Kunjungan::with(['pasien', 'dokter'])->get();
        return view('kunjungan.index', compact('kunjungan'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();

        Carbon::setLocale('id');

        $hariIni = Carbon::now()->isoFormat('dddd');

        $dokterHariIni = Dokter::whereHas('jadwal', function ($q) use ($hariIni) {
            $q->where('hari', $hariIni);
        })->get();

        return view('kunjungan.create', compact('pasien', 'dokterHariIni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'nullable|string',
            'diagnosa' => 'nullable|string',
        ]);

        $kunjungan = Kunjungan::create($request->all());

        $dataEmail = [
            'nama' => $kunjungan->pasien->nama,
            'tanggal' => $kunjungan->tanggal_kunjungan,
            'dokter' => $kunjungan->dokter->nama,
        ];

        Mail::to($kunjungan->pasien->email)->send(new NotifikasiKunjungan($dataEmail));

        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan berhasil ditambahkan.');
    }

    public function show(Kunjungan $kunjungan)
    {
        $kunjungan->load(['pasien', 'dokter', 'resep']);
        return view('kunjungan.show', compact('kunjungan'));
    }

    public function edit(Kunjungan $kunjungan)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('kunjungan.edit', compact('kunjungan', 'pasien', 'dokter'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'nullable|string',
            'diagnosa' => 'nullable|string',
        ]);

        $kunjungan->update($request->all());

        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan berhasil diperbarui.');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan berhasil dihapus.');
    }
}
