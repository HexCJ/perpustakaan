<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peminjaman1 = Peminjaman::create([
            'nama_peminjam' => 'Tono',
            'alamat_peminjam' => 'jl.123',
            'email_peminjam' => 'tono@gmail.com',
            'notelp_peminjam' => '0811',
            'kode_buku' => 'B001',
            'petugas' => 'admin',
            'tgl_pengembalian' => '2024-06-28',
            'status' => 'dipinjam',
        ]);

        $peminjaman2 = Peminjaman::create([
            'nama_peminjam' => 'Tono',
            'alamat_peminjam' => 'jl.123',
            'email_peminjam' => 'tono@gmail.com',
            'notelp_peminjam' => '0811',
            'kode_buku' => 'B002',
            'petugas' => 'penjaga',
            'tgl_pengembalian' => '2024-06-28',
            'status' => 'dipinjam',
        ]);
    }
}
