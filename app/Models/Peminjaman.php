<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $appends = ['created_at_indo'];


    protected $fillable = [
        'nama_peminjam',
        'alamat_peminjam',
        'email_peminjam',
        'notelp_peminjam',
        'kode_buku',
        'tgl_pengembalian',
        'petugas',
        'status'
    ];

    public function buku()
    {
        return $this->belongsTo(DataBuku::class, 'kode_buku', 'kode_buku');
    }

    // Mutator untuk tgl_pengembalian
    public function setTglPengembalianAttribute($value)
    {
        $this->attributes['tgl_pengembalian'] = Carbon::parse($value)->format('Y-m-d');
    }
    

    public function getCreatedAtIndoAttribute(){
        // Mengatur lokal ke bahasa Indonesia
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l,d F Y'); //jika hanya ingin menggunakan angka semua maka d m Y, besar kecil huruf berpengaruh
    }

    public function getTglPengembalianAttribute($value)
    {
        Carbon::setLocale('id');
        return Carbon::parse($value)->format('l, d F Y');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($peminjaman) {
            $dataBuku = DataBuku::where('kode_buku', $peminjaman->kode_buku)->first();
            if ($dataBuku) {
                $dataBuku->update([
                    'jumlah_tersedia' => $dataBuku->jumlah_tersedia - 1,
                ]);            
            }
        });

        static::updated(function ($peminjaman) {
            $dataBuku = DataBuku::where('kode_buku', $peminjaman->kode_buku)->first();

            if ($dataBuku) {
                $dataBuku->update([
                    'jumlah_tersedia' => $dataBuku->jumlah_tersedia + 1,
                ]);
            }
        });

        static::deleted(function ($peminjaman) {
            $dataBuku = DataBuku::where('kode_buku', $peminjaman->kode_buku)->first();

            if ($dataBuku) {
                $dataBuku->update([
                    'jumlah_tersedia' => $dataBuku->jumlah_tersedia + 1,
                ]);
            }
        });

    }
}
