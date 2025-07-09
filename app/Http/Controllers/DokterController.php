<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Kunjungan;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        return view('dokter.index', compact('dokter'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'spesialis' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function show(Dokter $dokter)
    {
        return view('dokter.show', compact('dokter'));
    }

    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'spesialis' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }

    public function kunjungan5Hari()
    {
        \Carbon\Carbon::setLocale('id'); // agar format tanggal pakai Bahasa Indonesia

        $hariIni = \Carbon\Carbon::today();
        $dataHari = [];

        for ($i = 0; $i < 5; $i++) {
            $tanggal = $hariIni->copy()->addDays($i)->toDateString();

            $jumlah = \App\Models\Kunjungan::whereDate('tanggal_kunjungan', $tanggal)
                ->count();

            switch ($i) {
                case 0:
                    $label = 'Hari ini';
                    break;
                case 1:
                    $label = 'Besok';
                    break;
                case 2:
                    $label = 'Lusa';
                    break;
                default:
                    $label = $i . ' hari lagi';
                    break;
            }

            $dataHari[] = [
                'hari_ke' => 'Hari ' . ($i + 1),
                'label' => $label,
                'tanggal' => \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y'),
                'jumlah' => $jumlah
            ];
        }

        return view('dokter.kunjungan_harian', compact('dataHari'));
    }
}
