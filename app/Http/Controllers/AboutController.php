<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function edit()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string',
            'values' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'hours' => 'nullable|string|max:255',
        ]);

        $about = About::first();
        if ($about) {
            $about->update($data);
        } else {
            About::create($data);
        }

        return redirect()->route('admin.about.edit')->with('success', 'About berhasil diperbarui.');
    }
}
