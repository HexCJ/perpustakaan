<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function show(){
        $dpembelian = Pembelian::paginate(5);
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
            return redirect()->route('tambah_pembelian')->with('fail', 'Data User gagal ditambahkan');
        }
    }

    public function destroy($id)
    {
        $data = Pembelian::findOrFail($id);
        $nama_buku = $data->nama_buku;
        if($data->delete()){
            return redirect()->back()->with('success', 'Data Pembelian '.$nama_buku.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Pembelian gagal '.$nama_buku.' dihapus');
        }
    }
}
