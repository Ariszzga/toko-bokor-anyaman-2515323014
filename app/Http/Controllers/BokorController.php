<?php

namespace App\Http\Controllers;

use App\Models\Bokor;
use App\Models\Category;
use App\Models\Pengrajin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BokorController extends Controller
{
    public function index()
    {
        return view('bokor.index', [
            'daftarBokor' => Bokor::with(['category', 'pengrajin'])->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('bokor.create', [
            'daftarKategori' => Category::orderBy('name')->get(),
            'daftarPengrajin' => Pengrajin::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->aturan(), $this->pesan());

        unset($validated['cover']);
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('sampul', 'public');
        }

        Bokor::create($validated);

        return redirect()->route('bokor.index')
            ->with('success', 'Bokor berhasil ditambahkan.');
    }

    public function show($id)
    {
        $bokor = Bokor::with(['category', 'pengrajin'])->find($id);

        return view('bokor.show', [
            'bokor' => $bokor,
            'id' => $id,
        ]);
    }

    public function edit(string $id)
    {
        return view('bokor.edit', [
            'bokor' => Bokor::findOrFail($id),
            'daftarKategori' => Category::orderBy('name')->get(),
            'daftarPengrajin' => Pengrajin::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $bokor = Bokor::findOrFail($id);

        $validated = $request->validate($this->aturan(), $this->pesan());

        unset($validated['cover']);
        $coverLama = null;
        if ($request->hasFile('cover')) {
            $coverLama = $bokor->cover;
            $validated['cover'] = $request->file('cover')->store('sampul', 'public');
        }

        $bokor->update($validated);

        if ($coverLama) {
            Storage::disk('public')->delete($coverLama);
        }

        return redirect()->route('bokor.show', $bokor->id)
            ->with('success', 'Bokor berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $bokor = Bokor::findOrFail($id);

        $bokor->delete();

        if ($bokor->cover) {
            Storage::disk('public')->delete($bokor->cover);
        }

        return redirect()->route('bokor.index')
            ->with('error', 'Bokor "'.$bokor->name.'" berhasil dihapus.');
    }

    private function aturan(): array
    {
        return [
            'name' => 'required|string|max:255',
            'artisan_name' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'pengrajin_id' => 'required|exists:pengrajins,id',
            'price' => 'required|numeric|min:0|max:99999999',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'made_year' => 'nullable|integer|min:1900|max:2100',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    private function pesan(): array
    {
        return [
            'name.required' => 'Nama bokor wajib diisi.',
            'name.max' => 'Nama bokor maksimal 255 karakter.',
            'artisan_name.required' => 'Nama pembuat wajib diisi.',
            'artisan_name.max' => 'Nama pembuat maksimal 255 karakter.',
            'material.required' => 'Bahan wajib diisi.',
            'material.max' => 'Bahan maksimal 255 karakter.',
            'category_id.required' => 'Pilih salah satu kategori.',
            'category_id.exists' => 'Kategori yang dipilih tidak ditemukan.',
            'pengrajin_id.required' => 'Pilih salah satu pengrajin.',
            'pengrajin_id.exists' => 'Pengrajin yang dipilih tidak ditemukan.',
            'price.required' => 'Harga wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh negatif.',
            'price.max' => 'Harga terlalu besar (maksimal 99.999.999).',
            'cover.image' => 'Sampul harus berupa gambar.',
            'cover.mimes' => 'Sampul harus berformat JPG atau PNG.',
            'cover.max' => 'Ukuran sampul maksimal 2 MB.',
            'cover.uploaded' => 'Sampul gagal diunggah. Periksa ukuran berkas (maksimal 2 MB).',
            'made_year.integer' => 'Tahun pembuatan harus berupa bilangan bulat.',
            'made_year.min' => 'Tahun pembuatan minimal 1900.',
            'made_year.max' => 'Tahun pembuatan maksimal 2100.',
            'cover.mimes' => 'Sampul harus berformat JPG, PNG, atau WebP.',
        ];
    }
}
