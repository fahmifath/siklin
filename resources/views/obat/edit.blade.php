@extends('adminlte::page')

@section('title', 'Edit Obat')

@section('content_header')
    <h1>Edit Obat</h1>
@endsection

@section('content')
<form action="{{ route('obat.update', $obat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-adminlte-input name="nama_obat" label="Nama Obat" value="{{ old('nama_obat', $obat->nama_obat) }}" required />

    @php
        $satuanList = ['Tablet', 'Kapsul', 'Sirup', 'Botol', 'Tube'];
        $selectedSatuan = old('satuan', $obat->satuan);
    @endphp
    <x-adminlte-select name="satuan" label="Satuan" required>
        <option value="">- Pilih Satuan -</option>
        @foreach($satuanList as $s)
            <option value="{{ $s }}" {{ $selectedSatuan == $s ? 'selected' : '' }}>{{ $s }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="stok" label="Stok" type="number" min="0" value="{{ old('stok', $obat->stok) }}" required />

    <x-adminlte-input name="harga" label="Harga (Rp)" type="number" min="0" value="{{ old('harga', $obat->harga) }}" required />

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan Perubahan" />
    <a href="{{ route('obat.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
