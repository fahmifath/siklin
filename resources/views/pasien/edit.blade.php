@extends('adminlte::page')

@section('title', 'Edit Pasien')
@section('content_header')
    <h1>Edit Pasien</h1>
@endsection

@section('content')
<form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-adminlte-input name="nik" label="NIK" value="{{ old('nik', $pasien->nik) }}" required />
    
    <x-adminlte-input name="nama" label="Nama" value="{{ old('nama', $pasien->nama) }}" required />
    
    <x-adminlte-input name="tanggal_lahir" label="Tanggal Lahir" type="date" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required />

    <x-adminlte-select name="jenis_kelamin" label="Jenis Kelamin">
        <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
    </x-adminlte-select>

    <x-adminlte-textarea name="alamat" label="Alamat">
        {{ old('alamat', $pasien->alamat) }}
    </x-adminlte-textarea>

    <x-adminlte-input name="no_hp" label="No HP" value="{{ old('no_hp', $pasien->no_hp) }}" />
    <x-adminlte-input name="email" label="Email" type="email" value="{{ old('email', $pasien->email) }}" />

    <x-adminlte-select name="is_bpjs" label="BPJS">
        <option value="1" {{ old('is_bpjs', $pasien->is_bpjs) == 1 ? 'selected' : '' }}>Ya</option>
        <option value="0" {{ old('is_bpjs', $pasien->is_bpjs) == 0 ? 'selected' : '' }}>Tidak</option>
    </x-adminlte-select>

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan Perubahan" />
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
