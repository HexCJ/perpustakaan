<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History Peminjaman') }}
        </h2>
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
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                            <tr id="row-{{ $peminjaman->id }}">
                                @if($peminjaman->status === 'dikembalikan')
                                <td>{{$loop->iteration}}</td>
                                <td>{{$peminjaman->nama_peminjam}}</td>
                                <td>{{$peminjaman->email_peminjam}}</td>
                                <td>{{$peminjaman->buku->nama_buku}}</td>
                                <td>{{$peminjaman->status}}</td>                                                               
                                <td class="border px-4 py-2 text-center">
                                    <div class="relative group">
                                        <a href="{{ route('peminjaman.detail', $peminjaman->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <i class="bi bi-eye text-xl font-bold" aria-hidden="true"></i>
                                        </a>
                                        <span class="tooltip-text absolute left-1/2 transform -translate-x-1/2 -translate-y-full bg-black text-white text-xs rounded py-1 px-2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Detail</span>
                                    </div>
                                </td>
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
