@extends('adminlte::page')

@section('title', 'Tambah Obat')

@section('content_header')
    <h1>Tambah Obat</h1>
@endsection

@section('content')
<form action="{{ route('obat.store') }}" method="POST">
    @csrf

    <x-adminlte-input name="nama_obat" label="Nama Obat" required />
    
    <x-adminlte-select name="satuan" label="Satuan" required>
        <option value="">- Pilih Satuan -</option>
        <option value="Tablet">Tablet</option>
        <option value="Kapsul">Kapsul</option>
        <option value="Sirup">Sirup</option>
        <option value="Botol">Botol</option>
        <option value="Tube">Tube</option>
    </x-adminlte-select>

    <x-adminlte-input name="stok" label="Stok" type="number" min="0" required />

    <x-adminlte-input name="harga" label="Harga (Rp)" type="number" min="0" required />

    <x-adminlte-button class="btn-primary" type="submit" label="Simpan" />
    <a href="{{ route('obat.index') }}" class="btn btn-secondary ml-2">Kembali</a>
</form>
@endsection
