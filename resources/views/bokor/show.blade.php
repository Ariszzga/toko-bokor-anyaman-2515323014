@extends('layouts.app')

@section('title', ($bokor->name ?? 'Bokor tidak ditemukan') . ' — Toko Bokor Anyaman')

@section('content')
    @if ($bokor)
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $bokor->cover_url }}" class="img-fluid rounded" alt="Foto {{ $bokor->name }}">
            </div>
            <div class="col-md-8">
                <span class="badge bg-secondary mb-2">{{ $bokor->category->name }}</span>
                <h1>{{ $bokor->name }}</h1>
                <p class="text-muted mb-1">Pembuat: {{ $bokor->artisan_name }}</p>
                <p class="text-muted mb-1">Pengrajin: {{ $bokor->pengrajin?->name ?? 'belum diisi' }}</p>
                <p class="text-muted mb-1">Bahan: {{ $bokor->material }}</p>
                @if ($bokor->made_year)
                    <p class="text-muted mb-1">Tahun pembuatan: {{ $bokor->made_year }}</p>
                @endif
                <p class="harga-bokor fs-4 mb-1">Rp{{ number_format($bokor->price, 0, ',', '.') }}</p>
                <p class="mb-3">
                    @if ($bokor->stock > 0)
                        <span class="badge bg-success">Stok: {{ $bokor->stock }}</span>
                    @else
                        <span class="badge bg-danger">Stok habis</span>
                    @endif
                </p>
                <a href="{{ route('bokor.index') }}" class="btn btn-outline-secondary">&larr; Kembali ke daftar bokor</a>
                <a href="{{ route('bokor.edit', $bokor->id) }}" class="btn btn-outline-primary">Ubah</a>
                <form action="{{ route('bokor.destroy', $bokor->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin menghapus bokor ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                </form>
            </div>
        </div>

        @if ($bokorSerupa->isNotEmpty())
            <hr class="my-4">
            <h2 class="h5">Bokor lain di kategori {{ $bokor->category->name }}</h2>
            <ul class="list-group">
                @foreach ($bokorSerupa as $serupa)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('bokor.show', $serupa->id) }}">{{ $serupa->name }}</a>
                        <span class="text-muted">Rp{{ number_format($serupa->price, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    @else
        <div class="alert alert-warning">
            <h1 class="h4">Bokor tidak ditemukan</h1>
            <p class="mb-0">Tidak ada bokor dengan id {{ $id }}.</p>
        </div>
        <a href="{{ route('bokor.index') }}" class="btn btn-outline-secondary mt-3">&larr; Kembali ke daftar bokor</a>
    @endif
@endsection
