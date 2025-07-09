@extends('adminlte::page')

@section('title', 'Data Obat')

@section('content_header')
    <h1>Data Obat</h1>
@endsection

@section('content')
<div class="mb-3 d-flex justify-content-between">
    <a href="{{ route('obat.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Obat
    </a>

    <button class="btn btn-success" data-toggle="modal" data-target="#importModal">
        <i class="fas fa-file-import"></i> Import Excel
    </button>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@include('data_tables.data_tables')

<table class="table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>Nama Obat</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($obat as $o)
        <tr>
            <td>{{ $o->nama_obat }}</td>
            <td>{{ $o->satuan }}</td>
            <td>{{ $o->stok }}</td>
            <td>Rp {{ number_format($o->harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('obat.edit', $o->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('obat.destroy', $o->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('obat.import') }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Import Data Obat</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="file" class="form-label">Pilih File Excel/CSV</label>
          <input type="file" name="file" class="form-control" accept=".xls,.xlsx,.csv" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Import</button>
      </div>
    </form>
  </div>
</div>
@endsection
