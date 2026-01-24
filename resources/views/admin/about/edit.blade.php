@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-24 bg-white shadow-md p-6 rounded-xl">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Edit Halaman Tentang Kami</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block font-medium mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description', $about->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Misi</label>
            <textarea name="mission" class="w-full border rounded p-2" rows="3">{{ old('mission', $about->mission ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Nilai (pisahkan dengan | )</label>
            <input type="text" name="values" value="{{ old('values', $about->values ?? '') }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Alamat</label>
            <input type="text" name="address" value="{{ old('address', $about->address ?? '') }}" class="w-full border rounded p-2">
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block font-medium mb-1">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $about->phone ?? '') }}" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $about->email ?? '') }}" class="w-full border rounded p-2">
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label class="block font-medium mb-1">Jam Operasional</label>
            <input type="text" name="hours" value="{{ old('hours', $about->hours ?? '') }}" class="w-full border rounded p-2">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('profil.edit') }}" class="ml-3 text-gray-600">Kembali</a>
    </form>
</div>
@endsection
