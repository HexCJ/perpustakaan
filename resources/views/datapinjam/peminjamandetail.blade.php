<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Nama Peminjam:</label>
                        <input type="text" value="{{$peminjamandetail->nama_peminjam}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Alamat Peminjam:</label>
                        <input type="text" value="{{$peminjamandetail->alamat_peminjam}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Email Peminjam:</label>
                        <input type="text" value="{{$peminjamandetail->email_peminjam}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">N0.Telp Peminjam:</label>
                        <input type="text" value="{{$peminjamandetail->notelp_peminjam}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Nama Buku:</label>
                        <input type="text" value="{{$peminjamandetail->buku->nama_buku}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pinjam:</label>
                        <input type="text" value="{{$peminjamandetail->created_at_indo}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pengembalian:</label>
                        <input type="text" value="{{$peminjamandetail->tgl_pengembalian}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Petugas / Peminjam:</label>
                        <input type="text" value="{{$peminjamandetail->petugas}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">status:</label>
                        <input type="text" value="{{$peminjamandetail->status}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
                    </div>

                 </div>
            </div>
        </div>
    </div>


</x-app-layout>
