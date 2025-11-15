@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-24 p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-green-700">Daftar Makanan</h1>
        <a href="{{ route('makanan.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">+ Tambah Makanan</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach ($makanans as $makanan)
        <div class="bg-white shadow-md rounded-2xl p-4 hover:shadow-lg">
            @if($makanan->gambar)
                <img src="{{ asset('storage/' . $makanan->gambar) }}" alt="{{ $makanan->nama }}" class="rounded-lg w-full h-48 object-cover mb-4">
            @endif
            <h2 class="text-lg font-semibold text-green-700">{{ $makanan->nama }}</h2>
            <p class="text-sm text-gray-600 mt-2">{{ $makanan->deskripsi }}</p>
            <div class="mt-4 flex justify-between">
                <a href="{{ route('makanan.edit', $makanan) }}" class="text-blue-600 text-sm hover:underline">Edit</a>
                <form action="{{ route('makanan.destroy', $makanan) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 text-sm hover:underline">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
