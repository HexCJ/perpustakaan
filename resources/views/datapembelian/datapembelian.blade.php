<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pembelian') }}
        </h2>

        <a href="{{route('tambah_pembelian')}}"> Tambah Pembelian </a>
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto border w-full text-center">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Kode Buku</th>
                                <th class="border px-4 py-2">Nama Buku</th>
                                <th class="border px-4 py-2">Pengarang</th>
                                <th class="border px-4 py-2">Harga Buku</th>
                                <th class="border px-4 py-2">Jumlah beli</th>
                                <th class="border px-4 py-2">Jumlah harga</th>
                                <th class="border px-4 py-2">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelians as $pembelian)
                            <tr>
                                <td >{{$loop->iteration}}</td>
                                <td >{{$pembelian->kode_buku}}</td>
                                <td >{{$pembelian->nama_buku}}</td>
                                <td >{{$pembelian->pengarang}}</td>
                                <td >{{$pembelian->harga}}</td>
                                <td >{{$pembelian->jumlah}}</td>
                                <td >{{$pembelian->total_harga}}</td>
                                <td >{{$pembelian->created_at_indo}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>


</x-app-layout>
