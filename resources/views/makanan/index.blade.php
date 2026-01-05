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

    <div class="bg-white shadow-md rounded-2xl p-6 mb-8">
        <h2 class="text-xl font-semibold text-green-700 mb-4">Rekomendasi Makanan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                <thead>
                    <tr class="text-sm text-gray-600">
                        <th class="px-4 py-2">Untuk Diet</th>
                        <th class="px-4 py-2">Untuk Menambah Berat Badan</th>
                        <th class="px-4 py-2">Untuk Menjaga Berat Badan</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <tr class="align-top">
                        <td class="px-4 py-3">
                            <ul class="list-disc ml-5">
                                <li>Sayuran hijau (bayam, kale)</li>
                                <li>Buah rendah gula (apel, beri)</li>
                                <li>Protein tanpa lemak (ikan, ayam tanpa kulit)</li>
                                <li>Yoghurt rendah lemak</li>
                                <li>Biji-bijian utuh (oat, quinoa)</li>
                                <li>Kacang-kacangan dalam porsi terkontrol</li>
                            </ul>
                        </td>
                        <td class="px-4 py-3">
                            <ul class="list-disc ml-5">
                                <li>Kacang-kacangan & selai kacang</li>
                                <li>Alpukat dan minyak sehat</li>
                                <li>Ikan berlemak (salmon)</li>
                                <li>Daging merah tanpa lemak</li>
                                <li>Susu penuh lemak, keju</li>
                                <li>Pati sehat (ubi, kentang) dan nasi</li>
                                <li>Smoothie kalori-dense (pisang, susu, selai kacang)</li>
                            </ul>
                        </td>
                        <td class="px-4 py-3">
                            <ul class="list-disc ml-5">
                                <li>Porsi terkontrol dari protein dan karbohidrat</li>
                                <li>Banyak sayur berwarna</li>
                                <li>Buah segar sebagai camilan</li>
                                <li>Biji-bijian utuh untuk energi stabil</li>
                                <li>Lemak sehat (minyak zaitun, ikan)</li>
                                <li>Air putih cukup & snack sehat (yoghurt)</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6 bg-green-50 border-l-4 border-green-200 p-4 rounded">
            <h3 class="font-semibold text-green-700">Tambahan Makanan</h3>
            <p class="text-sm text-gray-700 mt-1">Contoh tambahan: buah kering, kacang-kacangan, susu/inang-infused water, dan suplemen protein jika diperlukan. Gunakan sesuai kebutuhan dan konsultasi jika perlu.</p>
        </div>
    </div>

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
