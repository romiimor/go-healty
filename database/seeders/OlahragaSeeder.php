<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OlahragaSeeder extends Seeder
{
    public function run()
    {
        // Pastikan tabel ada
        if (!Schema::hasTable('olahragas')) {
            return;
        }

        DB::table('olahragas')->insert([
            [
                'nama' => 'HIIT (High Intensity Interval Training)',
                'deskripsi' => 'Latihan interval intensitas tinggi — 20–30 menit untuk pembakaran kalori optimal.',
                'gambar' => 'images/olahraga/hiit.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jumping Rope',
                'deskripsi' => 'Latihan kardio sederhana yang meningkatkan denyut jantung dan membakar kalori.',
                'gambar' => 'images/olahraga/jumping_rope.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jogging / Brisk Walk',
                'deskripsi' => 'Latihan berkelanjutan untuk membakar lemak dan meningkatkan kebugaran.',
                'gambar' => 'images/olahraga/jogging.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Plank',
                'deskripsi' => 'Menguatkan core untuk penampilan perut lebih kencang dan postur lebih baik.',
                'gambar' => 'images/olahraga/plank.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Squat & Glute Bridge',
                'deskripsi' => 'Latihan pengencangan otot paha, bokong, dan pinggul—membantu kulit tampak lebih kencang.',
                'gambar' => 'images/olahraga/squat.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Latihan Wajah / Facial Exercise',
                'deskripsi' => 'Serangkaian gerakan wajah untuk meningkatkan sirkulasi dan elastisitas kulit wajah.',
                'gambar' => 'images/olahraga/facial_exercise.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
