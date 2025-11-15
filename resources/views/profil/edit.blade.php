@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg max-w-lg">
    <h1 class="text-3xl font-bold text-green-700 mb-6 text-center">Edit Data Tubuh</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profil.update') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2 font-medium" for="tinggi_badan">Tinggi Badan (cm)</label>
            <input type="number" name="tinggi_badan" id="tinggi_badan" value="{{ old('tinggi_badan', $user->tinggi_badan) }}"
                   class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('tinggi_badan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2 font-medium" for="berat_badan">Berat Badan (kg)</label>
            <input type="number" name="berat_badan" id="berat_badan" value="{{ old('berat_badan', $user->berat_badan) }}"
                   class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('berat_badan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 w-full">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
