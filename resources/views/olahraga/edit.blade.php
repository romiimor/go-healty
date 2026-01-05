@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-24 p-6 bg-white rounded-2xl shadow">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-green-700">Edit Olahraga</h1>
        <a href="{{ route('olahraga.index') }}" class="text-sm text-gray-600 hover:underline">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 text-red-700 p-3 mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('olahraga.update', $olahraga) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Olahraga</label>
            <input type="text" name="nama" value="{{ old('nama', $olahraga->nama) }}" required class="mt-1 block w-full rounded-md border-gray-200 p-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-200 p-2">{{ old('deskripsi', $olahraga->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Gambar / GIF (opsional)</label>
            <input type="file" name="gambar" accept="image/*" class="mt-1 block w-full" />
            @if($olahraga->gambar)
                @php
                    $img = str_starts_with($olahraga->gambar, 'images/') ? asset($olahraga->gambar) : asset('storage/' . $olahraga->gambar);
                @endphp
                <img src="{{ $img }}" alt="current" class="w-48 h-32 object-cover rounded mt-2" />
            @endif
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Perbarui</button>
        </div>
    </form>
</div>
@endsection
