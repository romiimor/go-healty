@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 sm:p-6">
    <h1 class="text-4xl font-extrabold text-green-800 mb-8 border-b pb-2">Halaman Analisis BMI 🏋️</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- KARTU KIRI: Data Profil dan Hasil Analisis --}}
        <div class="lg:col-span-1 bg-white p-6 rounded-2xl shadow-xl h-fit border-t-4 border-green-500">
            <h2 class="text-xl font-bold text-gray-700 mb-4 border-b pb-2">Data Profil Anda</h2>
            <div class="space-y-2 text-gray-700">
                <p><strong class="text-green-700">Nama:</strong> {{ $user->name }}</p>
                <p><strong class="text-green-700">Tinggi Badan:</strong> {{ $user->tinggi_badan }} cm</p>
                <p><strong class="text-green-700">Berat Badan:</strong> {{ $user->berat_badan }} kg</p>
            </div>
        </div>

        {{-- KARTU TENGAH & KANAN: Hasil BMI dan Rekomendasi --}}
        <div class="lg:col-span-2">
            
            {{-- Hasil Analisis BMI --}}
            <div class="bg-white p-6 rounded-2xl shadow-xl mb-8 border-l-4 border-green-500">
                <h2 class="text-2xl font-bold mb-4 flex items-center text-green-700">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l2-2 2 2v13M9 19h12M9 19c0 1.105-1.79 2-4 2s-4-.895-4-2M11 5h2M12 2v2"></path></svg>
                    Hasil Analisis BMI
                </h2>
                
                @php
                    $bmiDisplay = number_format($bmi, 1);
                    // Hitung persentase bar, 40 adalah batas atas yang relatif aman untuk visualisasi
                    $bmiPercent = min(max(($bmi / 40) * 100, 0), 100); 
                    $barColor = match($kategori) {
                        'Kurus' => 'bg-blue-500',
                        'Ideal' => 'bg-green-600',
                        'Berat Badan Berlebih' => 'bg-yellow-500',
                        'Obesitas' => 'bg-red-600',
                        default => 'bg-gray-400'
                    };
                @endphp

                <div class="flex items-center justify-between text-2xl font-extrabold mb-2">
                    <p>BMI: <span class="text-green-700">{{ $bmiDisplay }}</span></p>
                    <p>Kategori: <span class="p-1 rounded text-white {{ $barColor }} text-base font-semibold">{{ $kategori }}</span></p>
                </div>

                {{-- Progress Bar BMI dengan Marker --}}
                <div class="w-full bg-gray-200 rounded-full h-4 mt-8 relative">
                    <div class="{{ $barColor }} h-4 rounded-full transition-all duration-500" style="width: {{ $bmiPercent }}%"></div>
                    
                    {{-- Marker BMI --}}
                    <span class="absolute top-0 transform -translate-x-1/2 -mt-7 text-xs font-bold text-gray-600" style="left: {{ $bmiPercent }}%">
                        {{ $bmiDisplay }} 🔽
                    </span>
                    
                    {{-- Label Kategori BMI (Batas) --}}
                    <div class="absolute inset-0 flex justify-between items-center text-xs font-semibold text-gray-500 px-1">
                        <span class="absolute" style="left: 18.5/40*100%;">|</span>
                        <span class="absolute" style="left: 25/40*100%;">|</span>
                        <span class="absolute" style="left: 30/40*100%;">|</span>
                    </div>
                </div>

                <p class="mt-8 text-lg p-3 rounded-lg border-l-4 border-green-700 bg-green-50 text-gray-800">
                    <strong class="text-green-700">Saran Utama:</strong> {{ $saran }}
                </p>
            </div>
            
            {{-- Rekomendasi Olahraga Detil --}}
            <div class="bg-white p-6 rounded-2xl shadow-xl">
                <h2 class="text-2xl font-bold mb-4 flex items-center text-green-700">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                    Rekomendasi Olahraga & Tindakan
                </h2>
                
                <ul class="space-y-3">
                    @foreach($rekomendasi as $item)
                        <li class="flex items-start bg-gray-50 p-3 rounded-lg border border-gray-200 hover:bg-green-100 transition duration-150">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection