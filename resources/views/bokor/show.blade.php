@extends('layouts.app')

@section('title', ($bokor['Nama'] ?? 'Bokor tidak ditemukan') . ' — Toko Bokor Anyaman')

@section('content')
    @if ($bokor)
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/bokor-1.png') }}" class="img-fluid rounded" alt="Foto {{ $bokor['Nama'] }}">
            </div>
            <div class="col-md-8">
                <h1>{{ $bokor['Nama'] }}</h1>
                <p class="text-muted mb-1">Pengrajin: {{ $bokor['pengrajin'] }}</p>
                <p class="text-muted mb-1">Bahan: {{ $bokor['bahan'] }}</p>
                <p class="harga-bokor fs-4">Rp{{ number_format($bokor['harga'], 0, ',', '.') }}</p>
                <a href="{{ url('/bokor') }}" class="btn btn-outline-secondary">&larr; Kembali ke daftar bokor</a>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            <h1 class="h4">Bokor tidak ditemukan</h1>
            <p class="mb-0">Tidak ada bokor dengan id {{ $id }}.</p>
        </div>
        <a href="{{ url('/bokor') }}" class="btn btn-outline-secondary mt-3">&larr; Kembali ke daftar bokor</a>
    @endif
@endsection