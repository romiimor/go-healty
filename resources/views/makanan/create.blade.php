@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-24 bg-white shadow-md p-6 rounded-xl">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Tambah Makanan</h2>
    <form action="{{ route('makanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="block font-medium mb-1">Nama Makanan</label>
            <input type="text" name="nama" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Harga (IDR)</label>
            <input type="number" name="price" step="0.01" min="0" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Kategori</label>
            <input type="text" name="kategori" class="w-full border rounded p-2" placeholder="Contoh: Minuman, Snack, Makanan Berat">
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="gambar" class="w-full">
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Simpan</button>
        <a href="{{ route('makanan.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
