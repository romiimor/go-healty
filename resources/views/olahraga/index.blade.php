@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-green-700 mb-6">Halaman Olahraga</h1>

    <div class="mb-4">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Tinggi Badan:</strong> {{ $user->tinggi_badan }} cm</p>
        <p><strong>Berat Badan:</strong> {{ $user->berat_badan }} kg</p>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-green-600">Hasil Analisis</h2>
        <p><strong>BMI:</strong> {{ number_format($bmi, 1) }}</p>
        <p><strong>Kategori:</strong> {{ $kategori }}</p>

        <div class="w-full bg-gray-200 rounded-full h-4 mt-3">
            @php
                $bmiPercent = min(max(($bmi / 40) * 100, 0), 100);
                $barColor = match($kategori) {
                    'Kurus' => 'bg-blue-400',
                    'Ideal' => 'bg-green-500',
                    'Berat Badan Berlebih' => 'bg-yellow-400',
                    'Obesitas' => 'bg-red-500',
                };
            @endphp
            <div class="{{ $barColor }} h-4 rounded-full" style="width: {{ $bmiPercent }}%"></div>
        </div>

        <p class="mt-4 text-gray-700"><strong>Saran:</strong> {{ $saran }}</p>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold text-green-600">Rekomendasi Olahraga</h2>
        @if($kategori === 'Kurus')
            <ul class="list-disc ml-6 text-gray-700">
                <li>Latihan beban (dumbbell, resistance band)</li>
                <li>Yoga atau pilates ringan</li>
            </ul>
        @elseif($kategori === 'Ideal')
            <ul class="list-disc ml-6 text-gray-700">
                <li>Jogging santai 3–4 kali seminggu</li>
                <li>Bersepeda atau berenang</li>
            </ul>
        @elseif($kategori === 'Berat Badan Berlebih')
            <ul class="list-disc ml-6 text-gray-700">
                <li>Cardio ringan (jalan cepat, aerobik)</li>
                <li>HIIT ringan dan stretching</li>
            </ul>
        @else
            <ul class="list-disc ml-6 text-gray-700">
                <li>Jalan kaki setiap hari minimal 30 menit</li>
                <li>Senam ringan dan diet seimbang</li>
            </ul>
        @endif
    </div>
</div>
@endsection
