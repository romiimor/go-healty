<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OlahragaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cegah error jika belum login atau data belum lengkap
        if (!$user || !$user->tinggi_badan || !$user->berat_badan) {
            return redirect()->route('home')->with('error', 'Lengkapi data tinggi dan berat badan Anda terlebih dahulu.');
        }

        // Hitung BMI (Body Mass Index)
        $tinggiMeter = $user->tinggi_badan / 100;
        $bmi = $user->berat_badan / ($tinggiMeter * $tinggiMeter);

        // Tentukan kategori
        if ($bmi < 18.5) {
            $kategori = 'Kurus';
            $saran = 'Perbanyak asupan kalori dan latihan kekuatan.';
        } elseif ($bmi < 25) {
            $kategori = 'Ideal';
            $saran = 'Pertahankan pola makan dan olahraga teratur.';
        } elseif ($bmi < 30) {
            $kategori = 'Berat Badan Berlebih';
            $saran = 'Coba latihan kardio ringan dan atur pola makan.';
        } else {
            $kategori = 'Obesitas';
            $saran = 'Fokus pada diet sehat dan olahraga rutin.';
        }

        return view('olahraga.index', compact('user', 'bmi', 'kategori', 'saran'));
    }
}
