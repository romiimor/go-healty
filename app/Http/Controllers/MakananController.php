<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use Illuminate\Support\Facades\Storage;

class MakananController extends Controller
{
    // 🔹 Tampilkan semua makanan
    public function index()
    {
        $makanans = Makanan::latest()->get();
        return view('makanan.index', compact('makanans'));
    }

    // 🔹 Form tambah makanan
    public function create()
    {
        return view('makanan.create');
    }

    // 🔹 Simpan makanan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('makanan', 'public');
            $makanan->gambar = $path;
        }

        Makanan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan!');
    }

    // 🔹 Form edit makanan
    public function edit(Makanan $makanan)
    {
        return view('makanan.edit', compact('makanan'));
    }

    // 🔹 Update makanan
    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $gambarPath = $makanan->gambar;
        if ($request->hasFile('gambar')) {
            if ($gambarPath) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('makanan', 'public');
        }

        $makanan->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui!');
    }

    // 🔹 Hapus makanan
    public function destroy(Makanan $makanan)
    {
        if ($makanan->gambar) {
            Storage::disk('public')->delete($makanan->gambar);
        }
        $makanan->delete();

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus!');
    }
}
