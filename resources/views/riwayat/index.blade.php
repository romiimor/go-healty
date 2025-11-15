@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 max-w-4xl bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-green-700 mb-6 text-center">Riwayat Berat Badan</h1>

    @if ($riwayats->isEmpty())
        <p class="text-center text-gray-500">Belum ada data riwayat berat badan.</p>
    @else
        <canvas id="weightChart" height="120"></canvas>

        <table class="w-full mt-8 border-collapse border border-gray-200 text-sm">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="py-2 px-4">Tanggal</th>
                    <th class="py-2 px-4">Berat (kg)</th>
                    <th class="py-2 px-4">Tinggi (cm)</th>
                    <th class="py-2 px-4">BMI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayats as $r)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $r->created_at->format('d M Y') }}</td>
                        <td class="py-2 px-4">{{ $r->berat_badan }}</td>
                        <td class="py-2 px-4">{{ $r->tinggi_badan }}</td>
                        <td class="py-2 px-4">{{ $r->bmi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('weightChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($riwayats->pluck('created_at')->map(fn($d) => $d->format('d M'))),
            datasets: [
                {
                    label: 'Berat Badan (kg)',
                    data: @json($riwayats->pluck('berat_badan')),
                    borderColor: 'rgb(34,197,94)',
                    fill: false,
                    tension: 0.3
                },
                {
                    label: 'BMI',
                    data: @json($riwayats->pluck('bmi')),
                    borderColor: 'rgb(59,130,246)',
                    fill: false,
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            },
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
</script>
@endsection
