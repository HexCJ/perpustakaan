<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function show(){
        $dpembelian = Pembelian::all();
        return view('datapembelian.datapembelian',[
        'pembelians' => $dpembelian
        ]);
    }

    public function create(){
        return view('datapembelian.adddatapembelian');
    }

    public function store(Request $request){
        $data['kode_buku'] = $request->kode_buku;
        $data['nama_buku'] = $request->nama_buku;
        $data['pengarang'] = $request->pengarang;
        $data['harga'] = $request->harga;
        $data['jumlah'] = $request->jumlah;
        $data['total_harga'] = $request->harga * $request->jumlah;

        if($pembelian = Pembelian::create($data)){
            return redirect()->route('datapembelian')->with('success', 'Data User berhasil ditambahkan');
        } else{
            return redirect()->route('datapembelian')->with('success', 'Data User berhasil ditambahkan');

        }
    }
}
