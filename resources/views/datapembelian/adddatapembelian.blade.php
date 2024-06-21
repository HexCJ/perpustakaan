<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datauser') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('store_pembelian') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="kode_buku" class="block text-gray-700 text-sm font-bold mb-2">Kode Buku:</label>
                            <input type="text" id="kode_buku" name="kode_buku" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="nama_buku" class="block text-gray-700 text-sm font-bold mb-2">Nama Buku:</label>
                            <input type="text" id="nama_buku" name="nama_buku" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="pengarang" class="block text-gray-700 text-sm font-bold mb-2">Pengarang:</label>
                            <input type="text" id="pengarang" name="pengarang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Harga Buku:</label>
                            <input type="text" id="harga" name="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah" class="block text-gray-700 text-sm font-bold mb-2">Jumlah di beli:</label>
                            <input type="text" id="jumlah" name="jumlah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="flex justify-end">
                            <a href="datapembelian" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
