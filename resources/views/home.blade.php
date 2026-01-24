<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai Romi - All You Can Drink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fcfbf7; }
        .glass-nav { background: rgba(252, 251, 247, 0.85); backdrop-filter: blur(12px); }
        
        /* Animasi Lembut */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .animate-float { animation: float 5s ease-in-out infinite; }

        /* Background Bambu Custom */
        .bamboo-bg {
            background-image: linear-gradient(to right, rgba(252, 251, 247, 0.92), rgba(252, 251, 247, 0.7)), 
                              url('https://images.unsplash.com/photo-1470093851219-69951fcbb533?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="text-gray-800 leading-relaxed">

    <nav class="flex justify-between items-center px-6 md:px-12 py-5 glass-nav fixed w-full top-0 z-50 border-b border-green-100/50">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-green-600 rounded-xl shadow-lg shadow-green-200">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-7 w-7 object-contain brightness-0 invert">
            </div>
            <a href="{{ url('/') }}" class="text-green-900 font-black text-xl tracking-tighter uppercase">Kedai <span class="text-orange-600">Romi</span></a>
        </div>

        <ul class="hidden md:flex space-x-10 text-[13px] uppercase tracking-widest font-extrabold text-gray-500">
            <li><a href="{{ url('/makanan') }}" class="hover:text-green-600 transition">Katalog</a></li>
            <li><a href="{{ route('bmi') }}" class="hover:text-green-600 transition">Lokasi Toko</a></li>
            <li><a href="{{ route('olahraga.index') }}" class="hover:text-green-600 transition">Tentang Kami</a></li>
        </ul>

        <div class="flex items-center space-x-5">
            @guest
                <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-green-700">Masuk</a>
                <a href="{{ route('register') }}" class="text-sm bg-green-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-green-700 transition shadow-lg shadow-green-200 hover:scale-105 transform">
                    Join Member
                </a>
            @endguest

            @auth
                <div class="flex items-center gap-4 bg-white/50 border border-green-100 px-4 py-2 rounded-2xl shadow-sm">
                    <span class="text-xs font-bold text-gray-500">Member: <span class="text-green-700 uppercase">{{ Auth::user()->name }}</span></span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-[10px] font-black text-red-400 hover:text-red-600 uppercase border-l border-gray-200 pl-4">Keluar</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <section class="relative min-h-screen bamboo-bg flex items-center pt-20">
        <div class="container mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-12 items-center relative z-10">
            
            <div class="space-y-8">
                <div class="inline-flex items-center space-x-2 bg-white/80 backdrop-blur px-4 py-2 rounded-full border border-orange-100 shadow-sm">
                    <span class="animate-pulse w-2 h-2 bg-orange-500 rounded-full"></span>
                    <span class="text-orange-600 text-[11px] font-black uppercase tracking-[0.2em]">The Best Beverage Hub 2026</span>
                </div>
                
                <h1 class="text-6xl md:text-8xl font-black text-green-950 leading-[0.95] tracking-tighter">
                    Segarkan <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-amber-500">Jiwamu.</span>
                </h1>
                
                <p class="text-gray-600 text-lg md:text-xl font-medium leading-relaxed max-w-md border-l-4 border-green-600 pl-6">
                    Hadir dengan nuansa estetik Jepang, Kedai Romi menyajikan racikan minuman yang membangkitkan senyum di setiap tegukan.
                </p>

                <div class="flex items-center gap-6 pt-4">
                    <a href="{{ route('register') }}" class="bg-green-700 text-white px-10 py-5 rounded-2xl font-black text-lg hover:bg-green-800 transition-all shadow-2xl shadow-green-900/20 hover:-translate-y-2">
                        Pesan Sekarang
                    </a>
                    <div class="flex -space-x-3">
                        <div class="w-12 h-12 rounded-full border-4 border-white bg-gray-200 overflow-hidden"><img src="https://i.pravatar.cc/100?u=1"></div>
                        <div class="w-12 h-12 rounded-full border-4 border-white bg-gray-200 overflow-hidden"><img src="https://i.pravatar.cc/100?u=2"></div>
                        <div class="w-12 h-12 rounded-full border-4 border-white bg-green-600 flex items-center justify-center text-white text-[10px] font-bold">+2k</div>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <div class="absolute -inset-10 bg-green-500/10 rounded-full blur-3xl group-hover:bg-orange-500/10 transition duration-1000"></div>
                <img src="{{ asset('images/background-fatsecret.png') }}" alt="Drink" class="relative z-10 w-full animate-float drop-shadow-[0_50px_50px_rgba(0,0,0,0.15)]">
                
                <div class="absolute bottom-10 -left-5 z-20 bg-white/90 backdrop-blur-xl p-6 rounded-[2rem] shadow-2xl border border-white/50 max-w-[200px] hidden md:block">
                    <div class="text-orange-500 font-black text-2xl mb-1">4.9/5</div>
                    <div class="text-gray-400 text-xs font-bold uppercase tracking-widest">Customer Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-green-900 mx-4 md:mx-12 rounded-[3rem] -mt-10 relative z-20 shadow-2xl">
        <div class="container mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div>
                <div class="text-3xl font-black italic">50+</div>
                <div class="text-green-300 text-[10px] font-bold uppercase tracking-widest">Varian Menu</div>
            </div>
            <div>
                <div class="text-3xl font-black italic">12k</div>
                <div class="text-green-300 text-[10px] font-bold uppercase tracking-widest">Happy Drinker</div>
            </div>
            <div>
                <div class="text-3xl font-black italic">24/7</div>
                <div class="text-green-300 text-[10px] font-bold uppercase tracking-widest">Online Support</div>
            </div>
            <div>
                <div class="text-3xl font-black italic">100%</div>
                <div class="text-green-300 text-[10px] font-bold uppercase tracking-widest">Bahan Alami</div>
            </div>
        </div>
    </section>

    <section class="py-32 container mx-auto px-6 md:px-12">
        <div class="bg-white rounded-[4rem] overflow-hidden border border-gray-100 shadow-sm flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 p-12 md:p-20 space-y-6">
                <h2 class="text-4xl md:text-5xl font-black text-green-950 leading-tight">Platform Digital <br> Jajanan <span class="text-orange-600 underline">Viral.</span></h2>
                <p class="text-gray-500 font-medium">Cari minuman impianmu, temukan nutrisinya, dan nikmati sensasi kesegaran yang belum pernah ada sebelumnya. Kami hadir untuk menuntaskan dahaga dan rasa penasaranmu.</p>
                <div class="pt-4">
                    <a href="{{ url('/makanan') }}" class="inline-flex items-center text-green-700 font-black uppercase text-sm tracking-widest group">
                        Jelajahi Sekarang 
                        <span class="ml-3 group-hover:ml-5 transition-all">→</span>
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 p-6">
                <img src="{{ asset('images/nutrisi.png') }}" class="rounded-[3rem] w-full object-cover shadow-2xl">
            </div>
        </div>
    </section>

    <section class="pb-32 container mx-auto px-6 md:px-12">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 px-4">
            <h2 class="text-4xl font-black text-green-950">Top <span class="text-orange-600">Choices.</span></h2>
            <p class="text-gray-400 font-bold">Paling banyak dipesan minggu ini.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="group relative pt-20">
                <div class="absolute inset-0 bg-white rounded-[3rem] shadow-xl group-hover:shadow-green-100 transition-all border border-gray-50"></div>
                <div class="relative z-10 px-8 pb-10 text-center">
                    <img src="{{ asset('images/minuman-manis.webp') }}" class="w-48 h-48 mx-auto -mt-32 object-cover rounded-full border-8 border-white shadow-2xl group-hover:scale-110 transition-transform">
                    <h3 class="mt-6 text-2xl font-black text-green-950">Sweet Berry</h3>
                    <p class="text-gray-400 text-sm mt-2 font-medium">Perpaduan buah berry segar dengan foam susu lembut.</p>
                </div>
            </div>
            
            <div class="group relative pt-20">
                <div class="absolute inset-0 bg-white rounded-[3rem] shadow-xl group-hover:shadow-green-100 transition-all border border-gray-50"></div>
                <div class="relative z-10 px-8 pb-10 text-center">
                    <img src="{{ asset('images/coffee.webp') }}" class="w-48 h-48 mx-auto -mt-32 object-cover rounded-full border-8 border-white shadow-2xl group-hover:scale-110 transition-transform">
                    <h3 class="mt-6 text-2xl font-black text-green-950">Kyoto Coffee</h3>
                    <p class="text-gray-400 text-sm mt-2 font-medium">Biji kopi pilihan dengan aroma bambu yang menenangkan.</p>
                </div>
            </div>

            <div class="group relative pt-20">
                <div class="absolute inset-0 bg-white rounded-[3rem] shadow-xl group-hover:shadow-green-100 transition-all border border-gray-50"></div>
                <div class="relative z-10 px-8 pb-10 text-center">
                    <img src="{{ asset('images/minuman-soda.webp') }}" class="w-48 h-48 mx-auto -mt-32 object-cover rounded-full border-8 border-white shadow-2xl group-hover:scale-110 transition-transform">
                    <h3 class="mt-6 text-2xl font-black text-green-950">Soda Gembira</h3>
                    <p class="text-gray-400 text-sm mt-2 font-medium">Kesegaran klasik dengan sentuhan modern Kedai Romi.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-100 pt-24 pb-12">
        <div class="container mx-auto px-6 md:px-12 grid md:grid-cols-4 gap-12">
            <div class="md:col-span-2 space-y-6">
                <h3 class="text-3xl font-black text-green-950 italic">Kedai Romi.</h3>
                <p class="text-gray-400 max-w-sm font-medium leading-loose">Terima kasih telah menjadi bagian dari perjalanan kami menghadirkan kesegaran digital di Indonesia.</p>
            </div>
            <div class="space-y-6">
                <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-orange-600">Company</h4>
                <ul class="space-y-4 font-bold text-gray-600 text-sm">
                    <li><a href="#" class="hover:text-green-600">Our Story</a></li>
                    <li><a href="#" class="hover:text-green-600">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="space-y-6">
                <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-orange-600">Social</h4>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center hover:bg-green-600 hover:text-white transition cursor-pointer font-black">IG</div>
                    <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center hover:bg-green-600 hover:text-white transition cursor-pointer font-black">TW</div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-6 md:px-12 mt-20 pt-8 border-t border-gray-50 text-center text-gray-400 text-[10px] font-black tracking-widest uppercase">
            © 2026 KEDAI ROMI HUB — CRAFTED BY ROMI YAHYA
        </div>
    </footer>

</body>
</html>