@extends('adminlte::page')

@section('title', 'Tambah Resep')

@section('content_header')
    <h1>Tambah Resep</h1>
@endsection

@section('content')
<form action="{{ route('resep.store') }}" method="POST">
    @csrf

    <x-adminlte-select name="kunjungan_id" label="Pasien (Kunjungan)" required>
        <option value="">- Pilih Pasien -</option>
        @foreach($kunjungan as $k)
            <option value="{{ $k->id }}">
                {{ $k->pasien->nama }} - {{ $k->tanggal_kunjungan }}
            </option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-select name="obat_id" label="Obat" required>
        <option value="">- Pilih Obat -</option>
        @foreach($obat as $o)
            <option value="{{ $o->id }}">{{ $o->nama_obat }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="jumlah" label="Jumlah" type="number" min="1" required />
    <x-adminlte-input name="aturan_pakai" label="Aturan Pakai" />

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan" />
    <a href="{{ route('resep.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
