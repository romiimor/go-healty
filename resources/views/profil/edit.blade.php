@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 max-w-4xl" x-data="profilData">
    <h1 class="text-3xl font-bold text-green-700 mb-6 text-center">Profil & Riwayat Data Tubuh</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center shadow-md">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabs Navigation --}}
    <div class="flex border-b border-gray-300 mb-6">
        <button @click="tab = 'edit'" :class="{ 'border-green-500 text-green-700 font-semibold': tab === 'edit', 'border-transparent text-gray-500': tab !== 'edit' }"
            class="py-2 px-4 border-b-2 hover:text-green-600 transition duration-150">
            Edit Data Tubuh
        </button>
        <button @click="tab = 'riwayat'" :class="{ 'border-green-500 text-green-700 font-semibold': tab === 'riwayat', 'border-transparent text-gray-500': tab !== 'riwayat' }"
            class="py-2 px-4 border-b-2 hover:text-green-600 transition duration-150">
            Riwayat Berat Badan
        </button>
    </div>

    {{-- Tab Content: Edit Data Tubuh --}}
    <div x-show="tab === 'edit'" class="bg-white p-6 rounded-xl shadow-lg max-w-lg mx-auto">
        <h2 class="text-2xl font-semibold text-green-600 mb-4 border-b pb-2">Form Perubahan</h2>
        <form method="POST" action="{{ route('profil.update') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium" for="tinggi_badan">Tinggi Badan (cm)</label>
                <input type="number" name="tinggi_badan" id="tinggi_badan" value="{{ old('tinggi_badan', $user->tinggi_badan) }}"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('tinggi_badan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="berat_badan">Berat Badan (kg)</label>
                <input type="number" name="berat_badan" id="berat_badan" value="{{ old('berat_badan', $user->berat_badan) }}"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('berat_badan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 w-full">
                Simpan Perubahan
            </button>
        </form>
    </div>

    {{-- Tab Content: Riwayat Berat Badan (Menggabungkan Grafik & Tabel) --}}
    <div x-show="tab === 'riwayat'" class="bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-semibold text-green-600 mb-6 border-b pb-2">Grafik dan Data Riwayat</h2>

        @if ($riwayats->isEmpty())
            <p class="text-center text-gray-500">Belum ada data riwayat berat badan yang tersimpan.</p>
        @else
            {{-- Wrapper dengan Ketinggian Tetap (Memperbaiki Grafik Stretched) --}}
            <div class="mb-6" style="height: 350px;"> 
                <canvas id="weightChart" class="w-full h-full"></canvas>
            </div>
            {{-- End Wrapper --}}

            {{-- Tabel Riwayat --}}
            <h3 class="text-xl font-semibold text-gray-700 mb-4 mt-6">Data Riwayat Berat Badan</h3>
            <table class="w-full border-collapse border border-gray-200 text-sm">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Berat (kg)</th>
                        <th class="py-2 px-4">Tinggi (cm)</th>
                        <th class="py-2 px-4">BMI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayats->reverse() as $r) {{-- Membalik urutan agar data terbaru di atas --}}
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 text-center">{{ $r->created_at->format('d M Y') }}</td>
                            <td class="py-2 px-4 text-center font-medium">{{ $r->berat_badan }}</td>
                            <td class="py-2 px-4 text-center">{{ $r->tinggi_badan ?? $user->tinggi_badan }}</td>
                            <td class="py-2 px-4 text-center">{{ $r->bmi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- End Tabel --}}
        @endif
    </div>
</div>

{{-- Skrip Chart.js --}}
@if (!$riwayats->isEmpty())
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let chartInstance = null; // Variabel global untuk menyimpan instance chart

    // Fungsi untuk menginisialisasi/merender Chart
    const initChart = () => {
        // Cek apakah canvas sudah terlihat (offsetParent bukan null)
        if (document.getElementById('weightChart').offsetParent === null) {
            return; 
        }

        // Hapus instance lama sebelum membuat yang baru
        if (chartInstance) {
            chartInstance.destroy();
        }
        
        const ctx = document.getElementById('weightChart').getContext('2d');
        chartInstance = new Chart(ctx, { // Simpan instance
            type: 'line',
            data: {
                labels: @json($riwayats->pluck('created_at')->map(fn($d) => $d->format('d M'))),
                datasets: [
                    { label: 'Berat Badan (kg)', data: @json($riwayats->pluck('berat_badan')), borderColor: 'rgb(34,197,94)', backgroundColor: 'rgba(34,197,94, 0.1)', fill: true, tension: 0.3, borderWidth: 2 },
                    { label: 'BMI', data: @json($riwayats->pluck('bmi')), borderColor: 'rgb(59,130,246)', backgroundColor: 'rgba(59,130,246, 0.1)', fill: true, tension: 0.3, borderWidth: 2 }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: { legend: { position: 'top' }, title: { display: true, text: 'Tren Riwayat Berat Badan dan BMI', font: { size: 16 } } },
                scales: { y: { beginAtZero: false } }
            }
        });
    };
    
    // PENTING: Definisi Alpine Data
    document.addEventListener('alpine:init', () => {
        Alpine.data('profilData', () => ({
            tab: 'edit',
            init() {
                // Inisialisasi Chart saat 'tab' berubah ke 'riwayat'
                this.$watch('tab', value => {
                    if (value === 'riwayat') {
                        // Delay singkat untuk memastikan transisi CSS selesai
                        setTimeout(initChart, 50); 
                    }
                });
                
                // Inisialisasi saat pertama kali masuk jika tab defaultnya 'riwayat'
                if (this.tab === 'riwayat') {
                    initChart();
                }
            }
        }));
    });
</script>
@endif
@endsection