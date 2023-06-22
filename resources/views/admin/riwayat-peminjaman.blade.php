<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Peminjaman</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>

<body style="background-color: rgb(236, 236, 236)">
    <div class="container">
        <center>
            <h1>Riwayat Peminjaman Admin</h1>
        </center>
        <a href="/dashboard_admin" class="btn btn-m btn-info
        pull-right">kembali</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Nomor HP</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kode PBL</th>
                    <th>Goods ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayatPeminjaman as $riwayat)
                    <tr>
                        <td>{{ $riwayat->email }}</td>
                        <td>{{ $riwayat->nim }}</td>
                        <td>{{ $riwayat->nomor_hp }}</td>
                        <td>{{ $riwayat->jumlah }}</td>
                        <td>{{ $riwayat->tanggal_pinjaman }}</td>
                        <td>{{ $riwayat->tanggal_pengembalian }}</td>
                        <td>{{ $riwayat->kode_pbl }}</td>
                        <td>{{ $riwayat->goods_id }}</td>
                        <td>{{ $riwayat->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
