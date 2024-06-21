<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datauser') }}
        </h2>

        <button onclick="adduserb()"> Tambah User </button>
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
                                <th class="border px-4 py-2">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td >{{$loop->iteration}}</td>
                                <td >{{$user->name}}</td>
                                <td >{{$user->email}}</td>
                                <td >{{$user->role}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>

    <div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Tambah Item</p>
                <button id="closeModalBtn" onclick="closebtnadd()" class="text-gray-600 font-bold">&times;</button>
            </div>
            <form method="POST" action="{{route('tambah_datauser')}}">
                @csrf
                <div class="mb-2 flex">
                    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2 me-7">Nama:</label>
                    <input type="text" id="nama" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-2 flex">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 me-8">Email:</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-2 flex">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 me-2">Password:</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-2 flex">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2 me-10">Role:</label>
                    <select name="role" id="role" class="text-gray-700 text-sm font-bold border rounded w-full">
                        <option selected disabled>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="penjaga">Penjaga</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModalBtn2" onclick="closebtnadd()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>

    <script>
        const adduser = document.getElementById('addModal')
        function adduserb(){
            adduser.style.display = 'block'
        }
        function closebtnadd(){
            adduser.style.display = 'none'
        }
    </script>