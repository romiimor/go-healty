<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightHistory; // Pastikan model ini diimport
use App\Models\About;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    // ✅ Tampilkan form edit profil DAN riwayat
    public function edit()
    {
        $user = Auth::user();
        
        // 1. Ambil data riwayat (Logika RiwayatController::index)
        $riwayats = WeightHistory::where('user_id', $user->id)
                            ->orderBy('created_at', 'asc')
                            ->get();
        
        // 2. Hitung BMI pada riwayat jika belum ada (Opsional: Cek Model WeightHistory)
        // Kita asumsikan tinggi badan user saat ini digunakan untuk menghitung BMI pada semua riwayat.
        $riwayats = $riwayats->map(function ($r) use ($user) {
            // Jika kolom BMI di WeightHistory belum terisi
            if (!isset($r->bmi)) {
                $tinggiMeter = $user->tinggi_badan / 100;
                $bmi = $r->berat_badan / ($tinggiMeter * $tinggiMeter);
                $r->bmi = number_format($bmi, 1);
            }
            // Tambahkan tinggi badan dari user utama untuk ditampilkan di tabel riwayat
            $r->tinggi_badan = $user->tinggi_badan; 
            return $r;
        });


        $about = About::first();

        // ambil file gambar di public/images/team jika ada
        $teamImages = [];
        $teamPath = public_path('images/team');
        if (File::exists($teamPath)) {
            $files = File::files($teamPath);
            foreach ($files as $f) {
                $teamImages[] = 'images/team/' . $f->getFilename();
            }
        }

        // Kirimkan data user, riwayat, about, dan teamImages ke view
        return view('profil.edit', compact('user', 'riwayats', 'about', 'teamImages'));
    }

    // ✅ Update data profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'berat_badan' => 'required|integer|min:20|max:200',
            'tinggi_badan' => 'required|integer|min:100|max:250',
        ]);

        $user->update([
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
        ]);

        // Hitung BMI saat ini untuk disimpan ke WeightHistory
        $tinggiMeter = $request->tinggi_badan / 100;
        $currentBmi = $request->berat_badan / ($tinggiMeter * $tinggiMeter);

        // Tambahkan riwayat baru
        WeightHistory::create([
            'user_id' => $user->id,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan, // Simpan tinggi badan saat ini
            'bmi' => number_format($currentBmi, 1),    // Simpan BMI saat ini
            'tanggal' => now(),
        ]);

        return redirect()->route('profil.edit')->with('success', 'Profil dan riwayat berat badan berhasil diperbarui!');
    }
}