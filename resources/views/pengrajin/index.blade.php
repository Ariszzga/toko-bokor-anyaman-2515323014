@extends('layouts.app')

@section('title', 'Daftar Pengrajin — Toko Bokor Anyaman')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Pengrajin</h1>
        <a href="{{ route('pengrajin.create') }}" class="btn btn-primary">+ Tambah Pengrajin</a>
    </div>

    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Nama Pengrajin</th>
                <th>Kota Asal</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarPengrajin as $pengrajin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengrajin->name }}</td>
                    <td>{{ $pengrajin->city }}</td>
                    <td>
                        <a href="{{ route('pengrajin.edit', $pengrajin->id) }}" class="btn btn-sm btn-outline-secondary">Ubah</a>
                        <form action="{{ route('pengrajin.destroy', $pengrajin->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin menghapus pengrajin ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada pengrajin.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
