<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kunjungan;
use App\Models\Obat;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::with(['kunjungan.pasien', 'obat'])->get();
        return view('resep.index', compact('resep'));
    }

    public function create()
    {
        $kunjungan = Kunjungan::with('pasien')->get();
        $obat = Obat::all();
        return view('resep.create', compact('kunjungan', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required|integer|min:1',
            'aturan_pakai' => 'nullable|string|max:255',
        ]);

        Resep::create($request->all());

        return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    public function show(Resep $resep)
    {
        $resep->load(['kunjungan.pasien', 'obat']);
        return view('resep.show', compact('resep'));
    }

    public function edit(Resep $resep)
    {
        $kunjungan = Kunjungan::with('pasien')->get();
        $obat = Obat::all();
        return view('resep.edit', compact('resep', 'kunjungan', 'obat'));
    }

    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required|integer|min:1',
            'aturan_pakai' => 'nullable|string|max:255',
        ]);

        $resep->update($request->all());

        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui.');
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();
        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus.');
    }
}
