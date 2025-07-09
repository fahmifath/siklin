@extends('adminlte::page')

@section('title', 'Kunjungan Dokter 5 Hari ke Depan')

@section('content_header')
    <h1>Kunjungan 5 Hari ke Depan</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <ul class="list-group">
            @foreach($dataHari as $data)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $data['hari_ke'] }} ({{ $data['label'] }})</strong><br>
                        <small>{{ $data['tanggal'] }}</small>
                    </div>
                    <span class="badge bg-primary rounded-pill">
                        {{ $data['jumlah'] }} kunjungan
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

