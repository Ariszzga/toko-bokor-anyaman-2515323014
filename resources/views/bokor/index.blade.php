@extends('layouts.app')

@section('title', 'Daftar Bokor — Toko Bokor Anyaman')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Bokor Anyaman</h1>
        <a href="{{ route('bokor.create') }}" class="btn btn-primary">+ Tambah Bokor</a>
    </div>

    <form method="GET" action="{{ route('bokor.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="q" value="{{ $kataKunci }}" class="form-control"
                   placeholder="Cari nama bokor atau pembuat...">
        </div>
        <div class="col-md-3">
            <select name="kategori" class="form-select">
                <option value="">Semua kategori</option>
                @foreach ($daftarKategori as $kategori)
                    <option value="{{ $kategori->id }}" @selected($kategoriId == $kategori->id)>{{ $kategori->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="pengrajin" class="form-select">
                <option value="">Semua pengrajin</option>
                @foreach ($daftarPengrajin as $pengrajin)
                    <option value="{{ $pengrajin->id }}" @selected($pengrajinId == $pengrajin->id)>{{ $pengrajin->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if ($kataKunci || $kategoriId || $pengrajinId)
                <a href="{{ route('bokor.index') }}" class="btn btn-outline-secondary">Reset</a>
            @endif
        </div>
    </form>

    @if ($daftarBokor->isEmpty())
        <div class="alert alert-info">Tidak ada bokor yang cocok.</div>
    @else
        <p class="text-muted">Menampilkan {{ $daftarBokor->firstItem() }} sampai {{ $daftarBokor->lastItem() }} dari {{ $daftarBokor->total() }} bokor</p>
    @endif

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
                        <p class="card-text harga-bokor mb-1">Rp{{ number_format($bokor->price, 0, ',', '.') }}</p>
                        <p class="mb-2">
                            @if ($bokor->stock > 0)
                                <span class="badge bg-success">Stok: {{ $bokor->stock }}</span>
                            @else
                                <span class="badge bg-danger">Stok habis</span>
                            @endif
                        </p>
                        <a href="{{ route('bokor.show', $bokor->id) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $daftarBokor->links() }}
    </div>
@endsection
