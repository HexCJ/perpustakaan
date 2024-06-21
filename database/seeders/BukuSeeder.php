<?php

namespace Database\Seeders;

use App\Models\DataBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku1 = DataBuku::create([
            'kode_buku' => 'B001',
            'nama_buku' => 'si malin kundang',
            'jumlah_tersedia' => '2'
        ]);

        $buku2 = DataBuku::create([
            'kode_buku' => 'B002',
            'nama_buku' => 'kisah roro jongrang',
            'jumlah_tersedia' => '2'
        ]);
    }
}
