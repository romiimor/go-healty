<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go-Healthy - Halaman Awal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
</head>
<body class="bg-white text-gray-800">

    <nav class="flex justify-between items-center px-8 py-4 shadow-sm bg-white fixed w-full top-0 z-50">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-7">
            <a href="{{ url('/') }}" class="text-green-600 font-bold text-lg hover:text-green-700 transition">Go-Healthy</a>
        </div>

            <ul class="hidden md:flex space-x-8 text-sm font-medium">
            <li><a href="{{ url('/makanan') }}" class="hover:text-green-600 transition">Makanan</a></li>
            <li><a href="{{ route('bmi') }}" class="hover:text-green-600 transition">Badan massa Index (BMI)</a></li>
            <li><a href="{{ route('olahraga.index') }}" class="hover:text-green-600 transition">Olahraga</a></li>
        </ul>

        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-sm border border-green-600 text-green-600 px-4 py-1 rounded hover:bg-green-600 hover:text-white transition">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="text-sm bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700 transition">
                    Daftar
                </a>
            @endguest

            @auth
                <span class="text-sm text-gray-700">
                    Hai, <span class="font-semibold text-green-600">{{ Auth::user()->name }}</span>
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="ml-4 text-sm text-red-500 hover:underline">Keluar</button>
                </form>
            @endauth
        </div>
    </nav>

    <section 
        class="relative flex flex-col md:flex-row justify-between items-center px-6 md:px-12 pt-32 pb-24 bg-center min-h-screen overflow-hidden"
        style="
            background-image: url('{{ asset('images/background-fatsecret.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: right center;
        ">
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-transparent"></div>

        <div class="relative z-10 max-w-lg">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                Mengubah <span class="text-green-600">Penurunan Berat Badan</span><br>
                Melalui Inovasi Digital
            </h1>
            <p class="text-gray-700 mb-6">
                Kami membantu jutaan orang mencapai tujuan kesehatan mereka dengan solusi digital yang modern dan efektif.
            </p>
            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition inline-block">
                    Mulai Menggunakan Go-Healthy
                </a>
                <a href="{{ route('login') }}" class="text-green-700 font-medium hover:underline text-sm">Masuk di web</a>
            </div>
        </div>
    </section>

    
    @auth
        <div class="max-w-5xl mx-auto px-6 mt-8 text-center text-xl text-green-700">
            Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span> di Go-Healthy!
        </div>
    @endauth

    <section class="py-16 bg-white text-center">
        <h2 class="text-2xl font-bold mb-6 text-gray-900">Temukan Go-Healthy</h2>
        <p class="max-w-3xl mx-auto text-gray-800 mb-6">
            Go-Healthy adalah platform kesehatan digital yang membantu kamu mencapai berat badan ideal, Solusi kesehatan digital kami membantu orang mencapai tujuan penurunan berat badan mereka, menemukan informasi nutrisi yang akurat, dan mendukung aplikasi kesehatan global. Melalui ini, kami berdampak positif pada perjalanan berat badan dan kesehatan jutaan orang di seluruh dunia..memahami nutrisi, dan menemukan gaya hidup sehat yang berkelanjutan.
        </p>
    </section>

    <section class="py-16 md:py-20 bg-white border-t border-gray-100">
        <div class="container mx-auto px-6 md:px-12 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                
                {{-- KONTEN TEKS KIRI --}}
                <div class="md:pr-10">
                    <span class="text-sm font-semibold uppercase tracking-wider text-green-600">
                        PENCARIAN MAKANAN
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mt-2 mb-6">
                        Akses Informasi <br>Nutrisi Secara Instan
                    </h2>
                    <p class="text-gray-600 text-lg mb-8">
                        Ingin mengetahui kandungan nutrisi dan kalori dalam makanan Anda? Alat pencarian kami yang mudah digunakan memberikan Anda akses instan ke informasi nutrisi dan kalori yang akurat untuk makanan umum, makanan bermerek, makanan restoran, dan produk supermarket. Dengan basis data lebih dari 1,9 juta makanan yang telah diverifikasi secara global, Anda dapat dengan mudah tetap berada di jalur dengan tujuan penurunan berat badan Anda dengan mengetahui persis apa yang ada dalam makanan Anda.
                    </p>
                    <a href="{{ url('/makanan') }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-700 transition duration-150">
                        Temukan Fakta untuk Makanan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                {{-- GAMBAR KANAN --}}
                <div class="md:order-last order-first">
                    {{-- Ganti dengan path gambar Anda yang sesuai, misal: asset('images/food_scan.jpg') --}}
                    <img src="{{ asset('images/nutrisi.webp') }}" alt="Akses Informasi Nutrisi" class="rounded-2xl shadow-xl w-full max-h-[400px] object-cover">
                </div>

            </div>
        </div>
    </section>


    <section class="py-16 bg-white text-center">
        <h2 class="text-2xl font-bold mb-10 text-gray-800">Rekomendasi Kesehatan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-6 md:px-10 max-w-6xl mx-auto">

            <div class="shadow-lg rounded-2xl p-6 hover:shadow-2xl transition border border-gray-100">
                <img src="{{ asset('images/makanan.jpg') }}" alt="Makanan Sehat" class="rounded-xl w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold mb-2 text-green-700">Makanan Sehat</h3>
                <p class="text-gray-600 text-sm">Rekomendasi makanan bernutrisi tinggi untuk mendukung gaya hidup sehat.</p>
            </div>

            <div class="shadow-lg rounded-2xl p-6 hover:shadow-2xl transition border border-gray-100">
                <img src="{{ asset('images/olahraga.jpg') }}" alt="Olahraga" class="rounded-xl w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold mb-2 text-green-700">Olahraga Rekomendasi</h3>
                <p class="text-gray-600 text-sm">Kumpulan olahraga efektif untuk membakar kalori dan menjaga kebugaran tubuh.</p>
            </div>

            <div class="shadow-lg rounded-2xl p-6 hover:shadow-2xl transition border border-gray-100">
                <img src="{{ asset('images/kalori.jpg') }}" alt="Kalori" class="rounded-xl w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold mb-2 text-green-700">Kalori Ideal</h3>
                <p class="text-gray-600 text-sm">Panduan jumlah kalori harian sesuai kebutuhan tubuhmu.</p>
            </div>

        </div>
    </section>

    <section class="py-16 bg-green-600 text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Mulai Gaya Hidup Sehat Sekarang</h2>
        <p class="mb-6">Bergabunglah dengan jutaan pengguna yang telah memulai perjalanan sehat mereka bersama Go-Healthy.</p>
        <a href="{{ route('register') }}" class="bg-white text-green-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition">Buat Akun Gratis</a>
    </section>

    <footer class="py-8 bg-gray-900 text-gray-300 text-center text-sm">
        <div class="mb-4">
            <a href="#" class="mx-2 hover:text-white">Tentang Kami</a> |
            <a href="#" class="mx-2 hover:text-white">Kebijakan Privasi</a> |
            <a href="#" class="mx-2 hover:text-white">Kontak</a>
        </div>
        <p>© 2025 Go-Healthy | Dibuat oleh <span class="text-green-400 font-semibold">Romi Yahya</span></p>
    </footer>

</body>
</html>