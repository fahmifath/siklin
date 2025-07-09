@extends('adminlte::page')

@section('title', 'Edit Kunjungan')

@section('content_header')
    <h1>Edit Kunjungan</h1>
@endsection

@section('content')
<form action="{{ route('kunjungan.update', $kunjungan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-adminlte-select name="pasien_id" label="Pasien" required>
        <option value="">- Pilih Pasien -</option>
        @foreach($pasien as $p)
            <option value="{{ $p->id }}" {{ old('pasien_id', $kunjungan->pasien_id) == $p->id ? 'selected' : '' }}>
                {{ $p->nama }}
            </option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-select name="dokter_id" label="Dokter" required>
        <option value="">- Pilih Dokter -</option>
        @foreach($dokter as $d)
            <option value="{{ $d->id }}" {{ old('dokter_id', $kunjungan->dokter_id) == $d->id ? 'selected' : '' }}>
                {{ $d->nama }}
            </option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="tanggal_kunjungan" label="Tanggal Kunjungan" type="date"
        value="{{ old('tanggal_kunjungan', $kunjungan->tanggal_kunjungan) }}" required />

    <x-adminlte-textarea name="keluhan" label="Keluhan">{{ old('keluhan', $kunjungan->keluhan) }}</x-adminlte-textarea>

    <x-adminlte-textarea name="diagnosa" label="Diagnosa">{{ old('diagnosa', $kunjungan->diagnosa) }}</x-adminlte-textarea>

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan Perubahan" />
    <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
