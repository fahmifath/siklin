@extends('adminlte::page')

@section('title', 'Data Resep')

@section('content_header')
    <h1>Data Resep</h1>
@endsection


@section('content')
<a href="{{ route('resep.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Resep
</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@include('data_tables.data_tables')

<table class="table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>Pasien</th>
            <th>Obat</th>
            <th>Jumlah</th>
            <th>Aturan Pakai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($resep as $r)
        <tr>
            <td>{{ $r->kunjungan->pasien->nama }}</td>
            <td>{{ $r->obat->nama_obat }}</td>
            <td>{{ $r->jumlah }}</td>
            <td>{{ $r->aturan_pakai }}</td>
            <td>
                <a href="{{ route('resep.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('resep.destroy', $r->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus resep ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
