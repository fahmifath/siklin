@extends('adminlte::page')

@section('title', 'Tambah Dokter')

@section('content_header')
    <h1>Tambah Dokter</h1>
@endsection

@section('content')
    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf

        <x-adminlte-input name="nama" label="Nama Dokter" required />
        {{-- <x-adminlte-input name="spesialis" label="Spesialis" required /> --}}
        <x-adminlte-select name="spesialis" label="Spesialis" required>
            <option value="">- Pilih Spesialis -</option>
            <option value="Umum">Umum</option>
            <option value="Gigi">Gigi</option>
            <option value="Anak">Anak</option>
            <option value="Kandungan">Kandungan</option>
            <option value="Saraf">Saraf</option>
            <option value="Penyakit Dalam">Penyakit Dalam</option>
            <option value="Mata">Mata</option>
            <option value="THT">THT</option>
        </x-adminlte-select>

        <x-adminlte-input name="no_hp" label="No HP" />

        <x-adminlte-button class="btn-primary" type="submit" label="Simpan" />
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary ml-2">Kembali</a>
    </form>
@endsection
