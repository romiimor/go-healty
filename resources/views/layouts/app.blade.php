<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go-Healthy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Navbar -->
    <nav class="flex justify-between items-center px-8 py-4 bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
            <span class="font-bold text-green-600 text-xl">Go-Healthy</span>
        </div>
        <ul class="flex space-x-6 text-sm font-medium">
            <li><a href="{{ url('/') }}" class="hover:text-green-600">Beranda</a></li>
            <li><a href="{{ url('/makanan') }}" class="hover:text-green-600">Makanan</a></li>
            <li><a href="{{ route('olahraga') }}" class="text-gray-800 hover:text-green-600">Olahraga</a></li>
            <li><a href="{{ url('/kalori') }}" class="hover:text-green-600">Kalori</a></li>
            <li><a href="{{ route('profil.edit') }}" class="text-gray-800 hover:text-green-600">Edit Profil</a></li>
            <li><a href="{{ route('riwayat.index') }}" class="hover:text-green-600 transition">Riwayat</a></li>
        </ul>
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
        @yield('content')
    </main>

    <footer class="py-6 bg-gray-100 text-center text-gray-500 text-sm border-t">
        © 2025 Go-Healthy | Dibuat oleh <span class="text-green-600 font-semibold">Romi Yahya</span>
    </footer>
</body>
</html>
