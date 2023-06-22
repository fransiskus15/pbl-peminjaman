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
            <h1>Status Peminjaman</h1>
        </center>
        <a href="/dashboard_mahasiswa" class="btn btn-m btn-info
        pull-right">kembali</a>

        <table class="table table-bordered table-striped">
            {{-- @if (session('success'))
                <div style="color: green;">{{ session('success') }}</div>
            @endif --}}
            @if (session('notification'))
                <div class="alert alert-danger">
                    {{ session('notification') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <thead>
                <tr>
                    <th>No.</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Nomor HP</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kode PBL</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->email }}</td>
                        <td>{{ $loan->nim }}</td>
                        <td>{{ $loan->nomor_hp }}</td>
                        <td>{{ $loan->jumlah }}</td>
                        <td>{{ $loan->tanggal_pinjaman }}</td>
                        <td>{{ $loan->tanggal_pengembalian }}</td>
                        <td>{{ $loan->kode_pbl }}</td>
                        <td>{{ $loan->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
