<h1>{{ $bokor['Nama'] ?? 'Tidak ditemukan' }}</h1>

@if ($bokor)
    <p>Pengrajin: {{ $bokor['pengrajin'] }}</p>
    <p>Bahan: {{ $bokor['bahan'] }}</p>
    <p>Harga: Rp{{ number_format($bokor['harga'], 0, ',', '.') }}</p>
@else
    <p>Tidak ada bokor dengan id {{ $id }}.</p>
@endif