<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <title>Pengembalian Admin</title>
</head>

<body style="background-color: rgb(236, 236, 236)">
    <div class="container">
        <center>
            <h1>Status Pengembalian</h1>
        </center>
        <a href="/dashboard_admin" class="btn btn-m btn-info
        pull-right">kembali</a>
        <table class="table table-bordered table-striped">
            @if (session('success'))
                <div style="color: green;">{{ session('success') }}</div>
            @endif
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $histories)
                    <tr>

                        <td>{{ $histories->email }}</td>
                        <td>{{ $histories->nim }}</td>
                        <td>{{ $histories->nomor_hp }}</td>
                        <td>{{ $histories->jumlah }}</td>
                        <td>{{ $histories->tanggal_pinjaman }}</td>
                        <td>{{ $histories->tanggal_pengembalian }}</td>
                        <td>{{ $histories->kode_pbl }}</td>
                        <td>{{ $histories->goods_id }}</td>
                        {{-- <td>{{ $histories->status }}</td> --}}
                        <td>
                            <form action="{{ route('admin.loans.returns.update', $histories->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <select class="btn btn-secondary" name="status" onchange="this.form.submit()">
                                    <option class="btn btn-warning" value="pending"
                                        {{ $histories->status === 'dicek' ? 'selected' : '' }}>
                                        Tertunda
                                    </option>
                                    <option class="btn btn-success" value="setujui"
                                        {{ $histories->status === 'setujui' ? 'selected' : '' }}>Setujui
                                    </option>
                                    <option class="btn btn-danger" value="tolak"
                                        {{ $histories->status === 'tolak' ? 'selected' : '' }}>Tolak
                                    </option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
