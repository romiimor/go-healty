<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\WeightHistory;

class RiwayatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $riwayats = WeightHistory::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return view('riwayat.index', compact('riwayats'));
    }
}
