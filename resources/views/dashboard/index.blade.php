@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">

        <!-- Jumlah Dokter -->
        <div class="col-md-3">
            <a href="{{ route('dokter.index') }}" style="text-decoration: none;">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Dokter</h5>
                        <p class="card-text display-4">{{ $jumlahDokter }}</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Jumlah Pasien -->
        <div class="col-md-3">
            <a href="{{ route('pasien.index') }}" style="text-decoration: none;">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pasien</h5>
                        <p class="card-text display-4">{{ $jumlahPasien }}</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Obat Stok Minim -->
        <div class="col-md-3">
            <a href="{{ route('obat.index') }}" style="text-decoration: none;">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Obat Stok Minim (&lt; 10)</h5>
                        <p class="card-text display-4">{{ $stokMinim }}</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kunjungan Hari Ini -->
        <div class="col-md-3">
            <a href="{{ route('kunjungan.index') }}" style="text-decoration: none;">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Kunjungan Hari Ini</h5>
                        <p class="card-text display-4">{{ $kunjunganHariIni }}</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Resep -->
        <div class="col-md-3">
            <a href="{{ route('resep.index') }}" style="text-decoration: none;">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Resep</h5>
                        <p class="card-text display-4">{{ $totalResep }}</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection
