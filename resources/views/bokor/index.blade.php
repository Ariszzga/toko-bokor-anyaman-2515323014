@extends('layouts.app')

@section('title', 'Daftar Bokor — Toko Bokor Anyaman')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Bokor Anyaman</h1>
        <a href="{{ route('bokor.create') }}" class="btn btn-primary">+ Tambah Bokor</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($daftarBokor as $bokor)
            <div class="col">
                <div class="card h-100 kartu-bokor">
                    <img src="{{ $bokor->cover_url }}" class="card-img-top" alt="Foto {{ $bokor->name }}">
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary align-self-start mb-2">{{ $bokor->category->name }}</span>
                        <h5 class="card-title">{{ $bokor->name }}</h5>
                        <p class="card-text text-muted mb-1">Pembuat: {{ $bokor->artisan_name }}</p>
                        <p class="card-text small text-muted mb-1">{{ $bokor->pengrajin?->name ?? 'Pengrajin belum diisi' }}</p>
                        <p class="card-text text-muted mb-1">Bahan: {{ $bokor->material }}</p>
                        <p class="card-text harga-bokor">Rp{{ number_format($bokor->price, 0, ',', '.') }}</p>
                        <a href="{{ route('bokor.show', $bokor->id) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
