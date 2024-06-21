@if(session('fail'))
    <script>
        Swal.fire({
            title: "Gagal!",
            text: "{{ session('fail') }}!",
            background: '#272829',
            color: '#ffffff',
            confirmButtonColor: '#d33',
            icon: "error"
        });
    </script>
@elseif(session('success'))
    <script>
        Swal.fire({
            title: "Tambah data berhasil!",
            text: "{{ session('success') }}!",
            background: '#272829',
            color: '#ffffff',
            confirmButtonColor: '#d33',
            icon: "success"
        });
    </script>
@endif