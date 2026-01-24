<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Makanan;

class MakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Makanan::create([
            'nama' => 'Nasi Goreng Spesial',
            'deskripsi' => 'Nasi goreng dengan ayam, telur, dan sayuran segar.',
            'gambar' => null,
            'price' => 25000,
        ]);

        Makanan::create([
            'nama' => 'Ayam Bakar Madu',
            'deskripsi' => 'Ayam bakar dengan saus madu yang manis dan gurih.',
            'gambar' => null,
            'price' => 45000,
        ]);

        Makanan::create([
            'nama' => 'Salad Buah Segar',
            'deskripsi' => 'Campuran buah-buahan segar dengan dressing yogurt.',
            'gambar' => null,
            'price' => 32000,
        ]);
    }
}