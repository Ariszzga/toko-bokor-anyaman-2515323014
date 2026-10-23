<?php

namespace App\Http\Controllers;

use App\Models\Pengrajin;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PengrajinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengrajin.index', [
            'daftarPengrajin' => Pengrajin::orderBy('name')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengrajin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:pengrajins,name',
            'city' => 'required|string|max:100',
        ], [
            'name.required' => 'Nama pengrajin wajib diisi.',
            'name.max' => 'Nama pengrajin maksimal 100 karakter.',
            'name.unique' => 'Nama pengrajin ini sudah dipakai.',
            'city.required' => 'Kota asal wajib diisi.',
            'city.max' => 'Kota asal maksimal 100 karakter.',
        ]);

        Pengrajin::create($validated);

        return redirect()->route('pengrajin.index')
            ->with('success', 'Pengrajin berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pengrajin.edit', [
            'pengrajin' => Pengrajin::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengrajin = Pengrajin::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('pengrajins', 'name')->ignore($pengrajin->id),
            ],
            'city' => 'required|string|max:100',
        ], [
            'name.required' => 'Nama pengrajin wajib diisi.',
            'name.max' => 'Nama pengrajin maksimal 100 karakter.',
            'name.unique' => 'Nama pengrajin ini sudah dipakai.',
            'city.required' => 'Kota asal wajib diisi.',
            'city.max' => 'Kota asal maksimal 100 karakter.',
        ]);

        $pengrajin->update($validated);

        return redirect()->route('pengrajin.index')
            ->with('success', 'Pengrajin berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengrajin = Pengrajin::findOrFail($id);

        try {
            $pengrajin->delete();
        } catch (QueryException $e) {
            if ($e->getCode() !== '23000') {
                throw $e;
            }

            return redirect()->route('pengrajin.index')
                ->with('error', 'Pengrajin "'.$pengrajin->name.'" tidak bisa dihapus karena masih dipakai oleh bokor.');
        }

        return redirect()->route('pengrajin.index')
            ->with('error', 'Pengrajin "'.$pengrajin->name.'" berhasil dihapus.');
    }
}
