@extends('layouts.app')

@section('title', 'Tambah Bokor — Toko Bokor Anyaman')

@section('content')
    <h1 class="mb-4">Tambah Bokor</h1>

    <form action="{{ route('bokor.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 560px;">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Bokor</label>
            <input type="text" id="name" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="artisan_name" class="form-label">Nama Pembuat</label>
            <input type="text" id="artisan_name" name="artisan_name"
                   class="form-control @error('artisan_name') is-invalid @enderror"
                   value="{{ old('artisan_name') }}">
            @error('artisan_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="material" class="form-label">Bahan</label>
            <input type="text" id="material" name="material"
                   class="form-control @error('material') is-invalid @enderror"
                   value="{{ old('material') }}">
            @error('material')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select id="category_id" name="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih kategori --</option>
                @foreach ($daftarKategori as $kategori)
                    <option value="{{ $kategori->id }}" @selected(old('category_id') == $kategori->id)>
                        {{ $kategori->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pengrajin_id" class="form-label">Pengrajin</label>
            <select id="pengrajin_id" name="pengrajin_id"
                    class="form-select @error('pengrajin_id') is-invalid @enderror">
                <option value="">-- Pilih pengrajin --</option>
                @foreach ($daftarPengrajin as $pengrajin)
                    <option value="{{ $pengrajin->id }}" @selected(old('pengrajin_id') == $pengrajin->id)>
                        {{ $pengrajin->name }} ({{ $pengrajin->city }})
                    </option>
                @endforeach
            </select>
            @error('pengrajin_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="text" id="price" name="price"
                   class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="made_year" class="form-label">Tahun Pembuatan (opsional)</label>
            <input type="text" id="made_year" name="made_year"
                   class="form-control @error('made_year') is-invalid @enderror"
                   value="{{ old('made_year') }}">
            @error('made_year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Sampul (opsional, JPG/PNG, maksimal 2 MB)</label>
            <input type="file" id="cover" name="cover"
                   class="form-control @error('cover') is-invalid @enderror">
            @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('bokor.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
@endsection
