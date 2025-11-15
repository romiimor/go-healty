<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Go-Healthy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up {
            animation: fadeInUp 0.9s ease-out forwards;
        }

        @keyframes fadeDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-down {
            animation: fadeDown 1s ease-out forwards;
        }

        .btn-animate {
            transition: all 0.3s ease;
        }
        .btn-animate:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-8 py-4 shadow-sm bg-white fixed w-full top-0 z-50 fade-down">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-7">
            <span class="text-green-600 font-bold text-lg">Go-Healthy</span>
        </div>
        <a href="{{ url('/') }}" class="text-sm text-green-600 hover:underline">Kembali ke Beranda</a>
    </nav>

    <!-- Register Section -->
    <section class="flex items-center justify-center min-h-screen pt-20 pb-10 bg-gradient-to-b from-white to-green-50">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md fade-in-up">
            <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Daftar Akun Baru</h2>
            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                    <input type="text" name="name" 
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" 
                        placeholder="Masukkan nama lengkap" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" 
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" 
                        placeholder="Masukkan email" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Usia</label>
                    <input type="number" name="usia" min="10" max="100"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" 
                        placeholder="Masukkan usia (tahun)" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Tinggi Badan (cm)</label>
                    <input type="number" name="tinggi_badan" min="100" max="250"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" 
                        placeholder="Masukkan tinggi badan" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Berat Badan (kg)</label>
                    <input type="number" name="berat_badan" min="20" max="200"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" 
                        placeholder="Masukkan berat badan" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Kata Sandi</label>
                    <input type="password" name="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" 
                        placeholder="Buat kata sandi" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 outline-none" 
                        placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit" 
                        class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold btn-animate">
                    Daftar
                </button>
            </form>

            <p class="text-center text-sm mt-6 text-gray-600">
                Sudah punya akun?
                <a href="{{ url('/login') }}" class="text-green-600 hover:underline font-medium">Masuk Sekarang</a>
            </p>
        </div>
    </section>

    <footer class="py-6 bg-gray-100 text-center text-sm text-gray-500 border-t border-gray-200 fade-in-up">
        © 2025 Go-Healthy | Dibuat oleh <span class="text-green-600 font-semibold">Romi Yahya</span>
    </footer>

</body>
</html>
        