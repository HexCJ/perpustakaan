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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="min-height: 480px; max-height:480px">
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
                                <th class="border px-4 py-2">Aksi</th>
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
                                <td class="d-flex justify-content-center align-items-center">
                                        <div class="relative py-3">
                                            <button class="py-2 px-3 rounded bg-blue-500 text-white text-center focus:outline-none" onclick="toggleDropdown(event, 'dropdown-{{ $pembelian->id }}')">
                                                <i class="bi bi-gear mr-2"></i>Option
                                            </button>
                                            <div id="dropdown-{{ $pembelian->id }}" class="absolute hidden bg-white rounded shadow-lg mt-2 z-10">
                                                <a href="{{ route('edit_datapembelian', ['id' => $pembelian->id]) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                                    <i class="bi bi-pencil mr-4"></i>Edit
                                                </a>
                                                <form id="hapus-datapembelian-{{ $pembelian->id }}" action="{{ route('hapus_datapembelian', $pembelian->id) }}" method="POST">
                                                    <button type="button" id="btnHapusdatapembelian{{ $pembelian->id }}" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                                        <i class="bi bi-trash mr-1"></i>Hapus
                                                    </button>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                </td>
                                          <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                document.getElementById('btnHapusdatapembelian{{ $pembelian->id }}').addEventListener('click', function() {
                                                    Swal.fire({
                                                        title: 'Apakah Anda yakin menghapus {{ $pembelian->nama_buku}} ?',
                                                        text: "Data yang dihapus tidak dapat dikembalikan!",
                                                        icon: 'warning',
                                                        background: '#272829',
                                                        color: '#ffffff',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#FCDC2A',
                                                        confirmButtonText: 'Ya, hapus!',
                                                        cancelButtonText: 'Batal'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('hapus-datapembelian-{{ $pembelian->id }}').submit();
                                                        }
                                                    });
                                                });
                                            });
                                          </script>
                                        </li>
                                      </ul>
                                    </div>
                                </td>                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $pembelians->links() }}
        </div>
    </div>
</x-app-layout>


<script>
        function toggleDropdown(event, dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-button')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('hidden')) {
                    openDropdown.classList.add('hidden');
                }
            }
        }
    }

</script>