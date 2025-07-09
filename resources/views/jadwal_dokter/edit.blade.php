@extends('adminlte::page')

@section('title', 'Edit Jadwal Dokter')

@section('content_header')
    <h1>Edit Jadwal Dokter</h1>
@endsection

@section('content')
<form action="{{ route('jadwal_dokter.update', $jadwal_dokter->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-adminlte-select name="dokter_id" label="Nama Dokter" required>
        <option value="">- Pilih Dokter -</option>
        @foreach($dokter as $d)
            <option value="{{ $d->id }}" {{ old('dokter_id', $jadwal_dokter->dokter_id) == $d->id ? 'selected' : '' }}>
                {{ $d->nama }}
            </option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-select name="hari" label="Hari" required>
        <option value="">- Pilih Hari -</option>
        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
            <option value="{{ $hari }}" {{ old('hari', $jadwal_dokter->hari) == $hari ? 'selected' : '' }}>
                {{ $hari }}
            </option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="jam_mulai" label="Jam Mulai" type="time" value="{{ old('jam_mulai', $jadwal_dokter->jam_mulai) }}" required />
    <x-adminlte-input name="jam_selesai" label="Jam Selesai" type="time" value="{{ old('jam_selesai', $jadwal_dokter->jam_selesai) }}" required />

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan Perubahan" />
    <a href="{{ route('jadwal_dokter.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
