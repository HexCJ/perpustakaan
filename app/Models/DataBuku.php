<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_buku',
        'nama_buku',
        'jumlah_tersedia'
    ];
}
