<?php

namespace App\Http\Controllers;

use App\Models\Bokor;
use Illuminate\Http\Request;

class BokorController extends Controller
{
    public function index()
    {
        return view('bokor.index', [
            'daftarBokor' => Bokor::with('category')->get(),
        ]);
    }

    public function show($id)
    {
        $bokor = Bokor::with('category')->find($id);

        return view('bokor.show', [
            'bokor' => $bokor,
            'id' => $id,
        ]);
    }
}
