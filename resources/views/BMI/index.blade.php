@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-24 pb-12" style="background-color: #FFFDF5;">
    @php
        $galleryPath = public_path('images/kedai');
        $heroImg = null;
        if (file_exists($galleryPath)) {
            foreach (scandir($galleryPath) as $f) {
                if (in_array($f, ['.', '..'])) continue;
                $ext = pathinfo($f, PATHINFO_EXTENSION);
                if (!in_array(strtolower($ext), ['jpg','jpeg','png','webp','gif'])) continue;
                $heroImg = asset('images/kedai/' . rawurlencode($f));
                break;
            }
        }
        if (!$heroImg) {
            $heroImg = asset('images/kedai/Gambar%201.png');
        }
    @endphp

    <section class="w-full bg-cover bg-center" style="background-image: url('{{ $heroImg }}')">
        <div class="backdrop-filter backdrop-brightness-75">
            <div class="max-w-7xl mx-auto px-6 py-24 md:py-32">
                <div class="bg-white/10 p-6 md:p-10 rounded-2xl max-w-3xl">
                    <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-2">Lokasi <span class="text-orange-300">Kedai Romi</span></h1>
                    <p class="text-white/90 text-lg md:text-xl mb-6">Pasar Senen Blok 1, Jakarta Pusat — nikmati menu sehat kami langsung di kios.</p>
                    <a href="{{ route('makanan.index') }}" class="inline-block bg-orange-500 text-white px-5 py-3 rounded-lg font-semibold hover:bg-orange-600">Lihat Menu</a>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-xl border border-gray-50">
                <h2 class="text-2xl font-extrabold text-green-800 mb-4">Lokasi & Peta</h2>
                <div class="rounded-xl overflow-hidden shadow-md mb-4">
                    <iframe class="w-full h-96" src="https://www.google.com/maps?q=Pasar%20Senen%20Blok%201%20Jakarta%20Pusat&output=embed" frameborder="0" allowfullscreen></iframe>
                </div>
                <p class="text-gray-600">Kedai Romi berlokasi di area Pasar Senen Blok 1. Anda dapat langsung menuju lokasi menggunakan peta di atas.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-50">
                <h2 class="text-2xl font-extrabold text-green-800 mb-4">Galeri Toko</h2>
                <p class="text-sm text-gray-500 mb-4">Unggah gambar toko ke <strong>public/images/kedai/</strong>. File yang ditempatkan akan muncul di galeri.</p>
                @php
                    $galleryPath = public_path('images/kedai');
                    $images = [];
                    if (file_exists($galleryPath)) {
                        foreach (scandir($galleryPath) as $file) {
                            if (in_array($file, ['.', '..'])) continue;
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            if (!in_array(strtolower($ext), ['jpg','jpeg','png','webp','gif'])) continue;
                            $images[] = 'images/kedai/' . $file;
                        }
                    }
                @endphp

                <div x-data="{ open:false, img:'' }" @keydown.escape.window="open=false">
                    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @if(count($images) > 0)
                            @foreach($images as $img)
                                <div class="h-48 bg-gray-100 rounded overflow-hidden cursor-pointer" @click="img={{ json_encode(asset($img)) }}; open = true">
                                    <img src="{{ asset($img) }}" alt="Kedai Romi" loading="lazy" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        @else
                            <div class="h-48 bg-gray-100 rounded flex items-center justify-center text-gray-400">Gambar 1</div>
                            <div class="h-48 bg-gray-100 rounded flex items-center justify-center text-gray-400">Gambar 2</div>
                            <div class="h-48 bg-gray-100 rounded flex items-center justify-center text-gray-400">Gambar 3</div>
                        @endif
                    </div>

                    <div x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50" style="display:none">
                        <div class="relative max-w-4xl w-full mx-4" @click.away="open = false">
                            <button class="absolute top-3 right-3 text-white text-3xl leading-none" @click="open = false">&times;</button>
                            <div class="p-4">
                                <img :src="img" class="w-full h-auto max-h-[80vh] object-contain rounded-lg shadow-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection