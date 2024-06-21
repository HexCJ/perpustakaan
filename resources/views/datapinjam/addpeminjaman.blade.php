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
                    <form action="{{route ('store_pinjam')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Nama Peminjam:</label>
                        <input type="text" name="nama_peminjam"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="alamat_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Alamat Peminjam:</label>
                        <input type="text" name="alamat_peminjam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="email_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Email Peminjam:</label>
                        <input type="email" name="email_peminjam"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="notelp_peminjam" class="block text-gray-700 text-sm font-bold mb-2">N0.Telp Peminjam:</label>
                        <input type="text" name="notelp_peminjam"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="kode_buku" class="form-label">Nama Buku:</label>
                        <select class="form-select form-select-sm py-2 mb-2 text-secondary w-full" aria-label="Small select example" id="kode_buku" name="kode_buku" >
                            <option selected disabled>Pilih Buku yang di pinjam</option>
                            @foreach($bukus as $buku)
                                <option value="{{ $buku->kode_buku }}">{{ $buku->nama_buku }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-4">
                        <label for="tgl_pengembalian" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Peminjam:</label>
                        <input type="date" name="tgl_pengembalian"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="flex justify-end">
                        <a href="datapeminjaman" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                    </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>


</x-app-layout>
