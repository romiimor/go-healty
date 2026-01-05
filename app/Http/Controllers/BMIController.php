<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BMIController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user || !$user->tinggi_badan || !$user->berat_badan) {
            return redirect()->route('home')->with('error', 'Lengkapi data tinggi dan berat badan Anda terlebih dahulu.');
        }

        $tinggiMeter = $user->tinggi_badan / 100;
        if ($tinggiMeter == 0) {
            return redirect()->route('home')->with('error', 'Tinggi badan tidak valid.');
        }

        $bmi = $user->berat_badan / ($tinggiMeter * $tinggiMeter);

        [$kategori, $saran] = $this->analyzeBmiCategory($bmi);

        $rekomendasi = $this->getRekomendasiOlahraga($kategori);

        return view('BMI.index', compact('user', 'bmi', 'kategori', 'saran', 'rekomendasi'));
    }

    protected function analyzeBmiCategory(float $bmi): array
    {
        if ($bmi < 18.5) {
            return ['Kurus', 'Perbanyak asupan kalori dan fokus pada latihan kekuatan untuk meningkatkan massa otot.'];
        } elseif ($bmi < 25) {
            return ['Ideal', 'Pertahankan pola makan seimbang dan lanjutkan olahraga teratur untuk menjaga kebugaran.'];
        } elseif ($bmi < 30) {
            return ['Berat Badan Berlebih', 'Fokus pada defisit kalori harian dan tingkatkan intensitas latihan kardio secara bertahap.'];
        } else {
            return ['Obesitas', 'Prioritaskan perubahan diet yang signifikan dan mulai aktivitas fisik berdampak rendah.'];
        }
    }

    protected function getRekomendasiOlahraga(string $kategori): array
    {
        return match ($kategori) {
            'Kurus' => [
                'Fokus pada latihan kekuatan (resistance training) 3 kali seminggu.',
                'Perbanyak makanan tinggi protein untuk pertumbuhan otot.',
                'Lakukan olahraga kardio ringan (jalan kaki) agar tetap aktif.',
                'Tidur minimal 7-8 jam per malam untuk pemulihan otot.'
            ],
            'Ideal' => [
                'Jalankan kombinasi latihan kardio (jogging, berenang) dan kekuatan.',
                'Latihan 3–5 kali seminggu dengan durasi 30-60 menit.',
                'Coba variasi olahraga baru untuk menjaga motivasi (pilates, hiking).',
                'Pastikan pemanasan dan pendinginan setiap sesi.'
            ],
            'Berat Badan Berlebih' => [
                'Tingkatkan aktivitas kardio menjadi 4–5 kali seminggu.',
                'Pilih olahraga berdampak rendah seperti jalan cepat, bersepeda, atau aqua-aerobik.',
                'Lakukan High-Intensity Interval Training (HIIT) ringan untuk membakar lemak.',
                'Batasi konsumsi gula dan karbohidrat sederhana.'
            ],
            'Obesitas' => [
                'Mulai dengan aktivitas yang sangat ringan seperti jalan kaki di tempat atau yoga di kursi.',
                'Hindari latihan berdampak tinggi (melompat) untuk melindungi sendi.',
                'Konsultasi dengan profesional kesehatan sebelum memulai program latihan intensif.',
                'Fokus utama adalah perubahan pola makan dan konsistensi harian.'
            ],
            default => ['Tidak ada rekomendasi khusus.']
        };
    }
}
