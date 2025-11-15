<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightHistory;

class ProfilController extends Controller
{
    // ✅ Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
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

        WeightHistory::create([
            'user_id' => $user->id,
            'berat_badan' => $request->berat_badan,
            'tanggal' => now(),
        ]);

        return redirect()->route('profil.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
