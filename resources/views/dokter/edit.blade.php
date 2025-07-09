@extends('adminlte::page')

@section('title', 'Edit Dokter')

@section('content_header')
    <h1>Edit Dokter</h1>
@endsection

@section('content')
    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-adminlte-input name="nama" label="Nama Dokter" value="{{ old('nama', $dokter->nama) }}" required />
        <x-adminlte-select name="spesialis" label="Spesialis" required>
            <option value="">- Pilih Spesialis -</option>
            @php
                $spesialisList = ['Umum', 'Gigi', 'Anak', 'Kandungan', 'Saraf', 'Penyakit Dalam', 'Mata', 'THT'];
                $selected = old('spesialis', $dokter->spesialis);
            @endphp
            @foreach ($spesialisList as $spec)
                <option value="{{ $spec }}" {{ $selected == $spec ? 'selected' : '' }}>
                    {{ $spec }}
                </option>
            @endforeach
        </x-adminlte-select>

        {{-- <x-adminlte-input name="spesialis" label="Spesialis" value="{{ old('spesialis', $dokter->spesialis) }}" required /> --}}
        <x-adminlte-input name="no_hp" label="No HP" value="{{ old('no_hp', $dokter->no_hp) }}" />


        <x-adminlte-button class="btn-primary" type="submit" label="Simpan Perubahan" />
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary ml-2">Kembali</a>
    </form>
@endsection
