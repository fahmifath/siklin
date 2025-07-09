@extends('adminlte::page')

@section('title', 'Tambah Jadwal Dokter')

@section('content_header')
    <h1>Tambah Jadwal Dokter</h1>
@endsection

@section('content')
<form action="{{ route('jadwal_dokter.store') }}" method="POST">
    @csrf

    <x-adminlte-select name="dokter_id" label="Nama Dokter" required>
        <option value="">- Pilih Dokter -</option>
        @foreach($dokter as $d)
            <option value="{{ $d->id }}">{{ $d->nama }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-select name="hari" label="Hari" required>
        <option value="">- Pilih Hari -</option>
        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
            <option value="{{ $hari }}">{{ $hari }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="jam_mulai" label="Jam Mulai" type="time" required />
    <x-adminlte-input name="jam_selesai" label="Jam Selesai" type="time" required />

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan" />
    <a href="{{ route('jadwal_dokter.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
