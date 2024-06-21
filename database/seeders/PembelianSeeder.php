<?php

namespace Database\Seeders;

use App\Models\DataBuku;
use App\Models\Pembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembelian1 = Pembelian::create([
            'kode_buku' => 'B001',
            'nama_buku' => 'si malin kundang',
            'pengarang' => 'tidak tahu',
            'harga' => '10000',
            'jumlah' => '2',
            'total_harga' => '20000'
        ]);
        $pembelian2 = Pembelian::create([
            'kode_buku' => 'B002',
            'nama_buku' => 'kisah roro jongrang',
            'pengarang' => 'tidak tahu',
            'harga' => '10000',
            'jumlah' => '2',
            'total_harga' => '20000'
        ]);
    }
}
