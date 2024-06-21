<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function show(){
        $peminjaman = Peminjaman::with('buku')->get();
        return view('datapinjam.peminjaman',[
            'peminjamans' => $peminjaman
        ]);
    }

    public function showHistory(){
        $peminjaman = Peminjaman::with('buku')->get();
        return view('datapinjam.historypinjam',[
            'peminjamans' => $peminjaman
        ]);
    }

    public function showdetail($id)
    {
    // Mengambil pengguna berdasarkan ID dengan profil dan daftar mereka
    $peminjamandetail = Peminjaman::with('buku')->findOrFail($id);

    // Tampilkan hasilnya
    return view('datapinjam.peminjamandetail', compact('peminjamandetail'));
    }

    public function create(){
        $buku = DataBuku::all();
        return view('datapinjam.addpeminjaman',[
            'bukus' => $buku 
        ]);
    }

    public function store(Request $request){
        $petugas = Auth::user()->name;

        $data['nama_peminjam'] = $request->nama_peminjam;
        $data['alamat_peminjam'] = $request->alamat_peminjam;
        $data['email_peminjam'] = $request->email_peminjam;
        $data['notelp_peminjam'] = $request->notelp_peminjam;
        $data['kode_buku'] = $request->kode_buku;
        $data['tgl_pengembalian'] = $request->tgl_pengembalian;
        $data['petugas'] = $petugas;

        if(Peminjaman::create($data)){
            return redirect()->route('datapeminjaman')->with('success', 'Data User berhasil ditambahkan');
        } else{
            return redirect()->route('tambah_pinjam')->with('fail', 'Data User gagal ditambahkan');
        }
    }

    public function updateStatus(Request $request)
    {
    $peminjaman = Peminjaman::find($request->id);
    if ($peminjaman) {
        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
    }

    public function destroy($id)
    {
        $data = Peminjaman::findOrFail($id);
        if($data->delete()){
            return redirect()->back()->with('success', 'Data Peminjaman berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Peminjaman gagal dihapus');
        }
    }
}
