@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-24 pb-12" style="background-color: #FFFDF5;">
    @php
        // choose hero image: prefer team images, fallback to kedai
        $heroImg = null;
        $teamPath = public_path('images/Tim kami');
        if (file_exists($teamPath)) {
            foreach (scandir($teamPath) as $f) {
                if (in_array($f, ['.', '..'])) continue;
                $ext = pathinfo($f, PATHINFO_EXTENSION);
                if (!in_array(strtolower($ext), ['jpg','jpeg','png','webp','gif'])) continue;
                $heroImg = asset('images/' . rawurlencode('Tim kami') . '/' . rawurlencode($f));
                break;
            }
        }
        if (!$heroImg) {
            $kedaiPath = public_path('images/kedai');
            if (file_exists($kedaiPath)) {
                foreach (scandir($kedaiPath) as $f) {
                    if (in_array($f, ['.', '..'])) continue;
                    $ext = pathinfo($f, PATHINFO_EXTENSION);
                    if (!in_array(strtolower($ext), ['jpg','jpeg','png','webp','gif'])) continue;
                    $heroImg = asset('images/kedai/' . rawurlencode($f));
                    break;
                }
            }
        }
        if (!$heroImg) {
            $heroImg = asset('images/logo.png');
        }
    @endphp

    <section class="relative w-full bg-cover bg-center" style="background-image: url('{{ $heroImg }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        <div class="relative max-w-7xl mx-auto px-6 py-20 md:py-32">
            <div class="bg-black/30 backdrop-blur-sm p-6 md:p-10 rounded-2xl max-w-3xl">
                <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-3 drop-shadow-lg leading-tight">Tentang <span class="text-orange-300">Kedai Romi</span></h1>
                <p class="text-white/95 text-lg md:text-xl mb-6">Cerita, misi, dan komunitas kami — bergabunglah bersama coffee indonesia.</p>
                <a href="{{ route('makanan.index') }}" class="inline-block w-full sm:w-auto text-center bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 shadow-lg ring-2 ring-transparent focus:ring-orange-300">Lihat Menu</a>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 mt-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-xl border border-gray-50">
                <h2 class="text-2xl font-extrabold text-green-800 mb-4">@if(!empty($about->title)){{ $about->title }}@else Siapa Kami @endif</h2>
                <p class="text-gray-700 mb-4">@if(!empty($about->description)){{ $about->description }}@else Kedai Romi adalah tempat berkumpulnya pencinta makanan sehat dan lezat di Pasar Senen Blok 1. Kami menyediakan menu yang dibuat dari bahan pilihan, mengutamakan rasa dan gizi seimbang.@endif</p>

                <h3 class="text-xl font-bold text-gray-800 mt-6 mb-2">Misi Kami</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Menyediakan makanan sehat yang lezat dan terjangkau.</li>
                    <li>Mengedukasi pelanggan tentang pola makan seimbang.</li>
                    <li>Mendukung komunitas lokal dan pemasok setempat.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-6 mb-2">Nilai Kami</h3>
                <div class="grid md:grid-cols-3 gap-4">
                    @php
                        $values = [];
                        if (!empty($about->values)) {
                            $values = explode('|', $about->values);
                        }
                    @endphp
                    @if(!empty($values))
                        @foreach($values as $v)
                            <div class="p-4 rounded-lg bg-green-50 border">
                                <h4 class="font-bold text-green-700">{{ $v }}</h4>
                                <p class="text-sm text-gray-600">&nbsp;</p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-4 rounded-lg bg-green-50 border">
                            <h4 class="font-bold text-green-700">Nilai</h4>
                            <p class="text-sm text-gray-600">98%</p>
                        </div>
                        <div class="p-4 rounded-lg bg-orange-50 border">
                            <h4 class="font-bold text-orange-600">Keaslian</h4>
                            <p class="text-sm text-gray-600">100%</p>
                        </div>
                        <div class="p-4 rounded-lg bg-gray-50 border">
                            <h4 class="font-bold text-gray-700">Komunitas</h4>
                            <p class="text-sm text-gray-600">coffee indonesia</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-50">
                <h2 class="text-2xl font-extrabold text-green-800 mb-4">Info Kontak</h2>
                <p class="text-gray-700 mb-2"><strong>Alamat:</strong> {{ $about->address ?? 'Pasar Senen Blok 1, Jakarta Pusat' }}</p>
                <p class="text-gray-700 mb-2"><strong>Telepon:</strong> {{ $about->phone ?? '(087738401820) -' }}</p>
                <p class="text-gray-700 mb-4"><strong>Email:</strong> {{ $about->email ?? 'info@kedaIromi.example' }}</p>

                <h3 class="text-lg font-bold text-gray-800 mb-2">Jam Operasional</h3>
                <p class="text-gray-600 mb-4">Senin - Sabtu: 08:00 - 18:00</p>

                <h3 class="text-lg font-bold text-gray-800 mb-2">Lokasi di Peta</h3>
                <div class="rounded overflow-hidden mb-4">
                    <iframe class="w-full h-48" src="https://www.google.com/maps?q={{ urlencode($about->address ?? 'Pasar Senen Blok 1 Jakarta Pusat') }}&output=embed" frameborder="0" allowfullscreen></iframe>
                </div>

                <a href="{{ route('makanan.index') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Lihat Katalog Menu</a>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <a href="{{ route('admin.about.edit') }}" class="inline-block ml-2 bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">Edit About</a>
                @endif
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 mt-8">
        <h3 class="text-xl font-bold mb-4">Tim Kami</h3>
        @php
            if (empty($teamImages) || !count($teamImages)) {
                $teamImages = [];
                $teamPath = public_path('images/Tim kami');
                if (file_exists($teamPath)) {
                    foreach (scandir($teamPath) as $f) {
                        if (in_array($f, ['.', '..'])) continue;
                        $ext = pathinfo($f, PATHINFO_EXTENSION);
                        if (!in_array(strtolower($ext), ['jpg','jpeg','png','webp','gif'])) continue;
                        $teamImages[] = 'images/' . rawurlencode('Tim kami') . '/' . rawurlencode($f);
                    }
                }
            }
        @endphp

        <!-- Swiper carousel for team gallery -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <div class="w-full mt-6">
            <div class="swiper team-swiper">
                <div class="swiper-wrapper">
                    @if(!empty($teamImages) && count($teamImages))
                        @foreach($teamImages as $img)
                            <div class="swiper-slide rounded-lg overflow-hidden">
                                <img src="{{ asset($img) }}" alt="team" loading="lazy" class="w-full h-64 md:h-96 object-cover">
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide rounded-lg overflow-hidden flex items-center justify-center bg-gray-100 h-48">Tidak ada gambar tim</div>
                    @endif
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.team-swiper', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 12,
                    pagination: { el: '.swiper-pagination', clickable: true },
                    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                    breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
                });
            });
        </script>
    </div>
</div>

@endsection