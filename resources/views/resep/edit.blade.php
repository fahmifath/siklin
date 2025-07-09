@extends('adminlte::page')

@section('title', 'Edit Resep')

@section('content_header')
    <h1>Edit Resep</h1>
@endsection

@section('content')
<form action="{{ route('resep.update', $resep->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-adminlte-select name="kunjungan_id" label="Pasien (Kunjungan)" required>
        <option value="">- Pilih Pasien -</option>
        @foreach($kunjungan as $k)
            <option value="{{ $k->id }}"
                {{ old('kunjungan_id', $resep->kunjungan_id) == $k->id ? 'selected' : '' }}>
                {{ $k->pasien->nama }} - {{ $k->tanggal_kunjungan }}
            </option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-select name="obat_id" label="Obat" required>
        <option value="">- Pilih Obat -</option>
        @foreach($obat as $o)
            <option value="{{ $o->id }}"
                {{ old('obat_id', $resep->obat_id) == $o->id ? 'selected' : '' }}>
                {{ $o->nama_obat }}
            </option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="jumlah" label="Jumlah" type="number" min="1"
        value="{{ old('jumlah', $resep->jumlah) }}" required />

    <x-adminlte-input name="aturan_pakai" label="Aturan Pakai"
        value="{{ old('aturan_pakai', $resep->aturan_pakai) }}" />

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan Perubahan" />
    <a href="{{ route('resep.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
