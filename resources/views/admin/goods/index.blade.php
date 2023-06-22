<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar barang</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>

<body style="background-color: rgb(236, 236, 236)">
    <div class="container">
        <center>
            <h1>Daftar Barang</h1>
        </center>

        <a href="{{ route('admin.goods.create') }}" class="btn btn-primary mb-2">Tambah Barang</a>
        <a href="/dashboard_admin" class="btn btn-m btn-info mb-2">kembali</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($goods as $good)
                    <tr>
                        <td>{{ $good->name }}</td>
                        <td>{{ $good->stock }}</td>
                        <td>
                            <a href="{{ route('admin.goods.edit', $good) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.goods.destroy', $good) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
