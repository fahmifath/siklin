@extends('adminlte::page')

@section('title', 'Tambah Pasien')
@section('content_header')
    <h1>Tambah Pasien</h1>
@endsection

@section('content')
<form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <x-adminlte-input name="nik" label="NIK" required/>
    <x-adminlte-input name="nama" label="Nama" required/>
    <x-adminlte-input name="tanggal_lahir" label="Tanggal Lahir" type="date" required/>
    <x-adminlte-select name="jenis_kelamin" label="Jenis Kelamin">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </x-adminlte-select>
    <x-adminlte-textarea name="alamat" label="Alamat"/>
    <x-adminlte-input name="no_hp" label="No HP"/>
    <x-adminlte-input name="email" label="Email" type="email"/>
    <x-adminlte-select name="is_bpjs" label="BPJS">
        <option value="1">Ya</option>
        <option value="0">Tidak</option>
    </x-adminlte-select>
    <x-adminlte-button class="btn-primary" type="submit" label="Simpan"/>
</form>
@endsection
