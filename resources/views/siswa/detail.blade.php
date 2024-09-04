<!DOCTYPE html>
<html>
<head>
    <title>Detail Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Detail Siswa</h1>
    <p>ID: {{ $siswa->id }}</p>
    <p>Nama: {{ $siswa->name }}</p>
    <p>Email: {{ $siswa->email }}</p>
    <p>Alamat: {{ $siswa->address }}</p>
    <p>Tanggal Lahir: {{ $siswa->birth_date }}</p>
    <a href="/aplikasisekolah">Kembali</a>
</body>
</html>
