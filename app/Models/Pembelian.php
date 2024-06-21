<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_buku',
        'nama_buku',
        'pengarang',
        'jumlah',
        'harga',
        'total_harga'
    ];

    protected $appends = ['created_at_indo'];

    //mutator
    public function setKodeBukuAttribute($value)
    {
        $this->attributes['kode_buku'] = strtoupper(str_replace('-', '', $value));
    }

    public function setNamaBukuAttribute($value){
        $this->attributes['nama_buku'] = strtolower($value);
    }

    public function setHargaAttribute($value){
        $this->attributes['harga'] = str_replace('.','',$value);
    }
    //end mutator

    //asesor
    // public function getNamaBukuAttribute($value){
    //     return 'Nama Buku :' .$value;
    // }
    public function getHargaAttribute($value){
        return 'Rp.' .$value;
    }

    public function getCreatedAtIndoAttribute(){
        // Mengatur lokal ke bahasa Indonesia
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l,d F Y'); //jika hanya ingin menggunakan angka semua maka d m Y, besar kecil huruf berpengaruh
    }

    protected static function boot()
    {
        parent::boot();
        // static::created(function ($pembelian) {
        //     // Buat entri baru di Databuku
        //     DataBuku::create([
        //         'nama_buku' => $pembelian->nama_buku,
        //         'kode_buku' => $pembelian->kode_buku,
        //         'jumlah_tersedia' => $pembelian->jumlah,
        //     ]);
        // });

        static::created(function ($pembelian) {
            // Cek apakah kode_buku sudah ada di DataBuku
            $dataBuku = DataBuku::where('kode_buku', $pembelian->kode_buku)->first();

            if ($dataBuku) {
                // Jika sudah ada, tambahkan jumlah_tersedia
                $dataBuku->update([
                    'jumlah_tersedia' => $dataBuku->jumlah_tersedia + $pembelian->jumlah,
                ]);
            } else {
                // Jika belum ada, buat entri baru di DataBuku
                DataBuku::create([
                    'nama_buku' => $pembelian->nama_buku,
                    'kode_buku' => $pembelian->kode_buku,
                    'jumlah_tersedia' => $pembelian->jumlah,
                ]);
            }
        });


        static::deleted(function ($pembelian) {
            // Ambil data buku berdasarkan kode_buku
            $dataBuku = DataBuku::where('kode_buku', $pembelian->kode_buku)->first();

            if ($dataBuku) {
                // Kurangi jumlah_tersedia dengan jumlah yang dihapus
                $dataBuku->update([
                    'jumlah_tersedia' => $dataBuku->jumlah_tersedia - $pembelian->jumlah,
                ]);
            }
        });
        
    }
}
