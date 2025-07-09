@extends('adminlte::page')

@section('title', 'Jadwal Dokter')

@section('content_header')
    <h1>Jadwal Dokter</h1>
@endsection

@section('content')
<a href="{{ route('jadwal_dokter.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Jadwal
</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@include('data_tables.data_tables')

<table class="table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>Nama Dokter</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwal as $j)
        <tr>
            <td>{{ $j->dokter->nama }}</td>
            <td>{{ $j->hari }}</td>
            <td>{{ $j->jam_mulai }}</td>
            <td>{{ $j->jam_selesai }}</td>
            <td>
                <a href="{{ route('jadwal_dokter.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('jadwal_dokter.destroy', $j->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
