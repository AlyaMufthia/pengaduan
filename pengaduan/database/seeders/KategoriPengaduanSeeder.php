<?php

namespace Database\Seeders;

use App\Models\KategoriPengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriPengaduan::create([
            "nama" => 'Pembunuhan'
        ]);

        KategoriPengaduan::create([
            "nama" => 'Pembegalan'
        ]);
         KategoriPengaduan::create([
            "nama" => 'Pencurian'
        ]);

        KategoriPengaduan::create([
            "nama" => 'Lainnya'
        ]);
    }
}
