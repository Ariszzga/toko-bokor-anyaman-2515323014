@extends('layouts.app')

@section('title', 'Daftar Bokor — Toko Bokor Anyaman')

@section('content')
    <h1 class="mb-4">Daftar Bokor Anyaman</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($daftarBokor as $id => $bokor)
            <div class="col">
                <div class="card h-100 kartu-bokor">
                    <img src="{{ asset('images/bokor-1.png') }}" class="card-img-top" alt="Foto {{ $bokor['Nama'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $bokor['Nama'] }}</h5>
                        <p class="card-text text-muted mb-1">Pengrajin: {{ $bokor['pengrajin'] }}</p>
                        <p class="card-text text-muted mb-1">Bahan: {{ $bokor['bahan'] }}</p>
                        <p class="card-text harga-bokor">Rp{{ number_format($bokor['harga'], 0, ',', '.') }}</p>
                        <a href="{{ url('/bokor/'.$id) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection