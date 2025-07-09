@extends('adminlte::page')

@section('title', 'Data Pasien')

@section('content_header')
    <h1>Data Pasien</h1>
@endsection

@include('data_tables.data_tables')

@section('content')
<a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Pasien
</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tgl Lahir</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
            <th>BPJS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasien as $p)
        <tr>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->tanggal_lahir }}</td>
            <td>{{ $p->jenis_kelamin }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->no_hp }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->is_bpjs ? 'Ya' : 'Tidak' }}</td>
            <td>
                <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pasien.destroy', $p->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
