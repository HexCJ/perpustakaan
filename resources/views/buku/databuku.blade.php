<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku') }}
        </h2>

        <a href="{{route('tambah_pembelian')}}"> Tambah Buku </a>
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
                                <th class="border px-4 py-2">Jumlah Tersedia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukus as $buku)
                            <tr>
                                <td >{{$loop->iteration}}</td>
                                <td >{{$buku->kode_buku}}</td>
                                <td >{{$buku->nama_buku}}</td>
                                <td >{{$buku->jumlah_tersedia}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>


</x-app-layout>
