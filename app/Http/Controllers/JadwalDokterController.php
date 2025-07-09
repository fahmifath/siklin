<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwal = JadwalDokter::with('dokter')->get();
        return view('jadwal_dokter.index', compact('jadwal'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        return view('jadwal_dokter.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokter,id',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        JadwalDokter::create($request->all());

        return redirect()->route('jadwal_dokter.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function show(JadwalDokter $jadwal_dokter)
    {
        return view('jadwal_dokter.show', compact('jadwal_dokter'));
    }

    public function edit(JadwalDokter $jadwal_dokter)
    {
        $dokter = Dokter::all();
        return view('jadwal_dokter.edit', compact('jadwal_dokter', 'dokter'));
    }

    public function update(Request $request, JadwalDokter $jadwal_dokter)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokter,id',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal_dokter->update($request->all());

        return redirect()->route('jadwal_dokter.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(JadwalDokter $jadwal_dokter)
    {
        $jadwal_dokter->delete();
        return redirect()->route('jadwal_dokter.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
