<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run()
    {
        if (About::count() === 0) {
            About::create([
                'title' => 'Tentang Kedai Romi',
                'description' => 'Kedai Romi menyajikan makanan sehat dan lezat di Pasar Senen Blok 1. Kami berkomitmen pada kualitas dan komunitas lokal.',
                'mission' => 'Menyediakan makanan sehat yang terjangkau dan mendukung pemasok lokal.',
                'values' => 'Kualitas|Keaslian|Komunitas',
                'address' => 'Pasar Senen Blok 1, Jakarta Pusat',
                'phone' => '(021) -',
                'email' => 'info@kedaIromi.example',
                'hours' => 'Senin - Sabtu: 08:00 - 18:00',
            ]);
        }
    }
}
