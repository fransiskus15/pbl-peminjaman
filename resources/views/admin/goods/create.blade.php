<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>

<body style="background-color: rgb(236, 236, 236)">
    <div class="container">
        <center>
            <h1>Tambah Barang</h1>
        </center>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form action="{{ route('admin.goods.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="stock">Stok Barang</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}"
                    required>
            </div>

            <button type="submit" class="btn btn-m btn-primary">Simpan</button>
            <a href="/admin/goods" class="btn btn-m btn-info ">kembali</a>
        </form>
    </div>
</body>

</html>
