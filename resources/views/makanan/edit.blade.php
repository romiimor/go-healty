@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-24 bg-white shadow-md p-6 rounded-xl">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Edit Makanan</h2>
    <form action="{{ route('makanan.update', $makanan) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="block font-medium mb-1">Nama Makanan</label>
            <input type="text" name="nama" value="{{ $makanan->nama }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2" rows="4" required>{{ $makanan->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Harga (IDR)</label>
            <input type="number" name="price" step="0.01" min="0" value="{{ $makanan->price }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Kategori</label>
            <input type="text" name="kategori" value="{{ $makanan->kategori ?? '' }}" class="w-full border rounded p-2" placeholder="Contoh: Minuman, Snack, Makanan Berat">
        </div>
        <div class="mb-3">
            <label class="block font-medium mb-1">Gambar</label>
            @if($makanan->gambar)
                <img src="{{ asset('storage/' . $makanan->gambar) }}" class="w-32 mb-2 rounded">
            
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
            @endif
            <input type="file" name="gambar" class="w-full">
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Update</button>
        <a href="{{ route('makanan.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
