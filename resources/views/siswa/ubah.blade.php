<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Siswa</title>

</head>
<body>
    <h1>Ubah Data Siswa</h1>
    <form action="/siswa/update/{{ $siswa->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $siswa->name) }}"><br>
        @error('name')
            <div>{{ $message }}</div>
        @enderror

        <label for="email">Email:</label><br>
        <input type="text" name="email" value="{{ old('email', $siswa->email) }}"><br>
        @error('email')
            <div>{{ $message }}</div>
        @enderror

        <label for="address">Address:</label><br>
        <textarea name="address">{{ old('address', $siswa->address) }}</textarea><br>
        @error('address')
            <div>{{ $message }}</div>
        @enderror

        <label for="birth_date">Birth Date (mm-dd-yyyy):</label><br>
        <input type="text" name="birth_date" value="{{ old('birth_date', date('m-d-Y', strtotime($siswa->birth_date))) }}"><br>
        @error('birth_date')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Simpan Perubahan</button>
        <a href="/aplikasisekolah">Batal</a>
    </form>
</body>
</html>
