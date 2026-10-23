@extends('layouts.app')

@section('title', 'Ubah Pengrajin — Toko Bokor Anyaman')

@section('content')
    <h1 class="mb-4">Ubah Pengrajin</h1>

    <form action="{{ route('pengrajin.update', $pengrajin->id) }}" method="POST" style="max-width: 480px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Pengrajin</label>
            <input type="text" id="name" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $pengrajin->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Kota Asal</label>
            <input type="text" id="city" name="city"
                   class="form-control @error('city') is-invalid @enderror"
                   value="{{ old('city', $pengrajin->city) }}">
            @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pengrajin.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
@endsection
