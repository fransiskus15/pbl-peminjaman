<!DOCTYPE html>
<html>

<head>
    <title>Form Pengembalian Barang</title>
</head>

<body>
    <h1>Form Pengembalian Barang</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pengembalian.process') }}">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ old('nama') }}"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="{{ old('email') }}"><br>

        <label for="no_telp">No Telepon:</label>
        <input type="text" name="no_telp" value="{{ old('no_telp') }}"><br>

        <label for="nama_barang">Nama Barang:</label>
        <select name="nama_barang">
            @foreach ($goods as $good)
                <option value="{{ $good->name }}">{{ $good->name }}</option>
            @endforeach
        </select><br>

        <input type="submit" value="Kembalikan Barang">
    </form>
</body>

</html>
