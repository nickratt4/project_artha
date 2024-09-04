<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Siswa</title>
   
    <script>
        function validateNameInput(event) {
            const charCode = event.which ? event.which : event.keyCode;
            // Allow only letters, space, and single quote
            if ((charCode >= 65 && charCode <= 90) || 
                (charCode >= 97 && charCode <= 122) || 
                charCode === 32 || 
                charCode === 39) { // single quote
                return true;
            }
            event.preventDefault();
            return false;
        }

        function validateDateInput(event) {
            const today = new Date().toISOString().split('T')[0];
            const input = document.getElementById('birth_date');
            const inputDate = new Date(input.value);
            if (inputDate > new Date(today)) {
                alert('Tanggal tidak boleh lebih dari hari ini.');
                input.value = '';
                event.preventDefault();
            }
        }

        function validateEmailInput() {
            const email = document.getElementById('email').value;
            const emailPattern = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                alert('Email harus mengandung "@" dan domain.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Tambah Data Siswa</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/siswa/simpan') }}" method="POST" onsubmit="return validateEmailInput()">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" onkeypress="return validateNameInput(event)"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="{{ old('email') }}"><br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address">{{ old('address') }}</textarea><br><br>

        <label for="birth_date">Birth Date (mm-dd-yyyy):</label><br>
        <input type="text" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" placeholder="mm-dd-yyyy" onblur="validateDateInput(event)"><br><br>

        <button type="submit">Simpan Data</button>
        <a href="{{ url('/aplikasisekolah') }}">
            <button type="button">Batal</button>
        </a>
    </form>
</body>
</html>
