<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai Romi - Go-Healthy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> 
</head>
<body class="bg-gray-50 text-gray-800">
    <nav class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
                    <a href="{{ url('/') }}" class="flex items-baseline gap-2">
                        <span class="font-black text-2xl text-green-800">Kedai</span>
                        <span class="font-black text-2xl text-orange-500">Romi</span>
                    </a>
                </div>

                <ul class="hidden md:flex items-center gap-6 text-sm font-medium">
                    <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-green-600">Beranda</a></li>
                    <li><a href="{{ url('/makanan') }}" class="text-gray-700 hover:text-green-600">Makanan</a></li>
                    <li><a href="{{ route('bmi') }}" class="text-gray-700 hover:text-green-600">Lokasi Toko</a></li>
                    <li><a href="{{ route('olahraga.index') }}" class="text-gray-700 hover:text-green-600">Olahraga</a></li>
                    <li><a href="{{ route('profil.edit') }}" class="text-gray-700 hover:text-green-600">Tentang Kami</a></li>
                </ul>
                
                <div class="flex items-center gap-4">
                    <a href="{{ route('cart.index') }}" class="relative text-gray-700 hover:text-green-600">
                        @php
                            $cart = session('cart', []);
                            $cartCount = collect($cart)->sum('qty');
                        @endphp
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 7h14l-2-7M10 21a1 1 0 100-2 1 1 0 000 2zm6 0a1 1 0 100-2 1 1 0 000 2z" />
                        </svg>
                        <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">{{ $cartCount ?: 0 }}</span>
                    </a>

                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="text-sm text-gray-700 hover:text-red-600">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-green-600 hover:underline">Masuk</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-sm text-gray-700 hover:text-red-600">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-green-600 hover:underline">Masuk</a>
        @endauth
    </nav>

    <main class="pt-24 pb-16 px-6">
        <div class="max-w-7xl mx-auto px-6">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 text-yellow-800 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        @yield('content')
    </main>

    <footer class="py-6 bg-gray-100 text-center text-gray-500 text-sm border-t">
        © 2026 kedai Romi. Semua hak cipta dilindungi| Dibuat oleh <span class="text-green-600 font-semibold">Romi Yahya</span>
    </footer>
</body>
</html>