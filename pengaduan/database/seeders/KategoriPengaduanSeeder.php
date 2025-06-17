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
            "nama" => 'Infrastruktur'
        ]);

        KategoriPengaduan::create([
            "nama" => 'Lingkungan'
        ]);
         KategoriPengaduan::create([
            "nama" => 'Pelayanan Publik'
        ]);

        KategoriPengaduan::create([
            "nama" => 'Keamanan'
        ]);

        KategoriPengaduan::create([
            "nama" => 'Lainnya'
        ]);
    }
}
