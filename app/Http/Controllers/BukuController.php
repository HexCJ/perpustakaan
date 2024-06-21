<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function show(){
        $buku = DataBuku::paginate(10);
        return view('buku.databuku',[
            'bukus' => $buku
        ]);
    }
}
