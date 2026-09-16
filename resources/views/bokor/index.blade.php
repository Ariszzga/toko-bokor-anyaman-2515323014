<h1>Daftar Bokor</h1>
<ul>
    @foreach ($daftarBokor as $id => $bokor)
        <li><a href="/bokor/{{ $id }}">{{ $bokor['Nama'] }}</a></li>
    @endforeach
</ul>
