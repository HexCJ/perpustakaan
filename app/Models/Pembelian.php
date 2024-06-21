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

        static::created(function ($pembelian) {
            // Buat entri baru di Databuku
            DataBuku::create([
                'nama_buku' => $pembelian->nama_buku,
                'kode_buku' => $pembelian->kode_buku,
                'jumlah_tersedia' => $pembelian->jumlah,
            ]);
        });
    }
}
