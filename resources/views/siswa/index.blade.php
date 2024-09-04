<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
   
</head>
<body>
    <h1>Data Siswa</h1>
    <form action="/aplikasisekolah/search" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="query" placeholder="Cari siswa..." class="form-control" style="width: 300px; display: inline-block;">
        <button type="submit" class="btn">Cari</button>
    </form>
    <a href="{{ url('/siswa/tambah') }}"><button>Tambah Data</button></a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data_siswa as $siswa)
        <tr>
            <td>{{ $siswa->id }}</td>
            <td>{{ $siswa->name }}</td>
            <td>{{ $siswa->email }}</td>
            <td>{{ $siswa->address }}</td>
            <td>{{ $siswa->birth_date }}</td>
            <td>
                <a href="{{ url('/siswa/detail', $siswa->id) }}"><button>Detail</button></a>
                <a href="{{ url('/siswa/ubah', $siswa->id) }}"><button>Ubah</button></a>
                <form action="{{ url('/siswa/hapus', $siswa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
