<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
        </tr>
        @foreach ($data_siswa as $siswa)
        <tr>
            <td>{{ $siswa->id }}</td>
            <td>{{ $siswa->name }}</td>
            <td>{{ $siswa->email }}</td>
            <td>{{ $siswa->address }}</td>
            <td>{{ $siswa->birth_date }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
