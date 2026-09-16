<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class BokorController extends Controller
{
        private array $daftarBokor = [
        1 => ['Nama' => 'Bokor Anyaman Lidi Klasik', 'pengrajin' => 'Ni Made Ayu Kartika', 'bahan' => 'Lidi kelapa', 'harga' => 85000],
        2 => ['Nama' => 'Bokor Anyaman Bambu Ukir', 'pengrajin' => 'I Wayan Sudiarta', 'bahan' => 'Bambu', 'harga' => 120000],
        3 => ['Nama' => 'Bokor Anyaman Pandan Warna', 'pengrajin' => 'Kadek Agus Wirawan', 'bahan' => 'Daun pandan', 'harga' => 95000],
    ];
 
    public function index()
    {
        return view('bokor.index', ['daftarBokor' => $this->daftarBokor]);
    }
 
    public function show($id)
    {
        $bokor = $this->daftarBokor[$id] ?? null;
        return view('bokor.show', ['bokor' => $bokor, 'id' => $id]);
    }
 
}
 