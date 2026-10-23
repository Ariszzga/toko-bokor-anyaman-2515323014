<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/bokor') }}">Toko Bokor Anyaman</a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/bokor') }}">Bokor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengrajin.index') }}">Pengrajin</a>
            </li>
        </ul>
    </div>
</nav>
