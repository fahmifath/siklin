@extends('adminlte::page')

@section('title', 'Tambah Kunjungan')

@section('content_header')
    <h1>Tambah Kunjungan</h1>
@endsection

@section('content')
<form action="{{ route('kunjungan.store') }}" method="POST">
    @csrf

    <x-adminlte-select name="pasien_id" label="Pasien" required>
        <option value="">- Pilih Pasien -</option>
        @foreach($pasien as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-select name="dokter_id" label="Dokter" required>
        <option value="">- Pilih Dokter -</option>
        @foreach($dokterHariIni as $d)
            <option value="{{ $d->id }}">{{ $d->nama }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="tanggal_kunjungan" label="Tanggal Kunjungan" type="date" required />

    <x-adminlte-textarea name="keluhan" label="Keluhan" />

    <x-adminlte-textarea name="diagnosa" label="Diagnosa" />

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan" />
    <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
