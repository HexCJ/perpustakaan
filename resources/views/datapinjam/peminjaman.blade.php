<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku') }}
        </h2>
        <div class="flex">
        <a href="{{route('datapeminjamanhistory')}}" class="me-3"> History peminjaman</a>
        <a href="{{route('tambah_pinjam')}}"> Tambah Pinjam</a>
        </div>
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
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Nama Buku</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Ubah Status</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                            <tr id="row-{{ $peminjaman->id }}">
                                @if($peminjaman->status === 'dipinjam')
                                <td>{{$loop->iteration}}</td>
                                <td>{{$peminjaman->nama_peminjam}}</td>
                                <td>{{$peminjaman->email_peminjam}}</td>
                                <td>{{$peminjaman->buku->nama_buku}}</td>
                                <td>{{$peminjaman->status}}</td>                                
                                <td class="border px-4 py-2 text-center">
                                    <input type="radio" name="status_{{$peminjaman->id}}" value="dikembalikan" onclick="updateStatus({{ $peminjaman->id }})" {{ $peminjaman->status == 'dikembalikan' ? 'checked' : '' }}> Sudah Dikembalikan
                                </td>                                
                                <td>
                                    <div class="flex justify-evenly items-center">
                                    <div class="relative group">
                                        <a href="{{ route('peminjaman.detail', $peminjaman->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <i class="bi bi-eye text-xl font-bold" aria-hidden="true"></i>
                                        </a>
                                        <span class="tooltip-text absolute left-1/2 transform -translate-x-1/2 -translate-y-full bg-black text-white text-xs rounded py-1 px-2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Detail</span>
                                    </div>
                                    <div class="relative group">
                                        <form id="hapus-datapeminjaman-{{ $peminjaman->id }}" action="{{ route('hapus_datapeminjaman', $peminjaman->id) }}" method="POST">
                                            <button type="button" id="btnHapusdatapeminjaman{{ $peminjaman->id }}" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                                <i class="bi bi-trash mr-1"></i>
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <span class="tooltip-text absolute left-1/2 transform -translate-x-1/2 -translate-y-full bg-black text-white text-xs rounded py-1 px-2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Hapus</span>
                                    </div>
                                </div>
                                </td>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        document.getElementById('btnHapusdatapeminjaman{{ $peminjaman->id }}').addEventListener('click', function() {
                                            Swal.fire({
                                                title: 'Apakah Anda yakin menghapus {{ $peminjaman->nama_buku}} ?',
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
                                                    document.getElementById('hapus-datapeminjaman-{{ $peminjaman->id }}').submit();
                                                }
                                            });
                                        });
                                    });
                                  </script>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $bukus->links() }} --}}
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function updateStatus(id) {
        fetch('{{ route('peminjaman.updateStatus') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Status updated successfully');
                // Remove the row from the table
                document.getElementById('row-' + id).remove();
            } else {
                alert('Failed to update status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    }
</script>
