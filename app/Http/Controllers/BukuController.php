<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function show(){
        $buku = DataBuku::all();
        return view('buku.databuku',[
            'bukus' => $buku
        ]);
    }
}
