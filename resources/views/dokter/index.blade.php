@extends('adminlte::page')

@section('title', 'Data Dokter')

@section('content_header')
    <h1>Data Dokter</h1>
@endsection

@section('content')
<a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Dokter
</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@include('data_tables.data_tables')

<table class="table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dokter as $d)
        <tr>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->spesialis }}</td>
            <td>{{ $d->no_hp }}</td>
            <td>
                <a href="{{ route('dokter.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('dokter.destroy', $d->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
