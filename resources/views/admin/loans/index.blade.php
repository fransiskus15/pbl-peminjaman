<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('js/sweetalert.min.js') }}"></script> --}}

</head>

<body style="background-color: rgb(236, 236, 236)">


    <div class="container">
        <center>
            <h1>Daftar Peminjaman</h1>
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
                        <td>
                            <form action="{{ route('admin.loans.update', $loan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <select class="btn btn-secondary" name="status" onchange="this.form.submit()">
                                    <option class="btn btn-warning" value="pending"
                                        {{ $loan->status === 'pending' ? 'selected' : '' }}>
                                        Tertunda
                                    </option>
                                    <option class="btn btn-success" value="setujui"
                                        {{ $loan->status === 'setujui' ? 'selected' : '' }}>Setujui
                                    </option>
                                    <option class="btn btn-danger" value="tolak"
                                        {{ $loan->status === 'tolak' ? 'selected' : '' }}>Tolak
                                    </option>
                                </select>
                            </form>


                        </td>
                        <td>
                            <!-- Tampilkan tombol atau link aksi tambahan jika diperlukan -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>



</html>
