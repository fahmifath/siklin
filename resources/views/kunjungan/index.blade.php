@extends('adminlte::page')

@section('title', 'Data Kunjungan')

@section('content_header')
    <h1>Data Kunjungan</h1>
@endsection

@section('content')
<a href="{{ route('kunjungan.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Kunjungan
</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@include('data_tables.data_tables')

<table class="table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Keluhan</th>
            <th>Diagnosa</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kunjungan as $k)
        <tr>
            <td>{{ $k->tanggal_kunjungan }}</td>
            <td>{{ $k->pasien->nama }}</td>
            <td>{{ $k->dokter->nama }}</td>
            <td>{{ $k->keluhan }}</td>
            <td>{{ $k->diagnosa }}</td>
            <td>
                <a href="{{ route('kunjungan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kunjungan.destroy', $k->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
