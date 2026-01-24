<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use Illuminate\Support\Facades\Storage;

class MakananController extends Controller
{
    // 🔹 Tampilkan semua makanan
    public function index(Request $request)
    {
        $query = Makanan::query();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        switch ($request->get('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest();
        }

        $makanans = $query->get();
        $categories = Makanan::select('kategori')->distinct()->whereNotNull('kategori')->pluck('kategori');

        return view('makanan.index', compact('makanans', 'categories'));
    }

    // 🔹 Form tambah makanan
    public function create()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('makanan.create');
    }

    // 🔹 Simpan makanan baru
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'price' => 'required|numeric|min:0',
            'kategori' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('makanan', 'public');
            
        }

        Makanan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'price' => $request->price,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan!');
    }

    // 🔹 Form edit makanan
    public function edit(Makanan $makanan)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('makanan.edit', compact('makanan'));
    }

    // 🔹 Update makanan
    public function update(Request $request, Makanan $makanan)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'price' => 'required|numeric|min:0',
            'kategori' => 'nullable|string|max:100',
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
            'price' => $request->price,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui!');
    }

    // 🔹 Hapus makanan
    public function destroy(Makanan $makanan)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($makanan->gambar) {
            Storage::disk('public')->delete($makanan->gambar);
        }
        $makanan->delete();

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus!');
    }
}
