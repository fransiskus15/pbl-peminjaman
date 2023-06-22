<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/tool.css') }}" rel="stylesheet">
    <title>Form Pengembalian</title>

    <script>
        function confirmPengembalian() {
            if (confirm('Apakah Anda yakin ingin melakukan pengembalian?')) {
                document.getElementById('pengembalian-form').submit();
            } else {
                return false;
            }
        }
    </script>


</head>

<body
    style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(img/poltek.jpg) center no-repeat fixed;">
    <h1>Form Pengembalian Barang</h1>

    <center>
        @if (session('success'))
            <div style="color: rgb(33, 255, 3);">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </center>

    <div class="container">
        <form id="pengembalian-form" action="{{ route('loan.return') }}" method="POST">
            @csrf

            @foreach ($loans as $loan)
                <div class="labels">
                    <label for="email">Email</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="email" name="email" class="form-control"
                        value="{{ $loan->email }}" readonly>
                </div>


                <div class="labels">
                    <label for="nim">NIM</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="text" name="nim" class="form-control"
                        value="{{ $loan->nim }}" readonly>
                </div>

                <div class="labels">
                    <label for="nomor_hp">Nomor HP</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="text" name="nomor_hp" class="form-control"
                        value="{{ $loan->nomor_hp }}" readonly>
                </div>

                <div class="labels">
                    <label for="jumlah">Jumlah</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="number" name="jumlah" class="form-control"
                        value="{{ $loan->jumlah }}" readonly>
                </div>

                <div class="labels">
                    <label for="goods_id">ID Barang</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="text" name="goods_id" class="form-control"
                        value="{{ $loan->goods_id }}" readonly>
                </div>

                <div class="labels">
                    <label for="tanggal_pinjaman">Tanggal Pinjaman</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="date" name="tanggal_pinjaman" class="form-control"
                        value="{{ $loan->tanggal_pinjaman }}" readonly>
                </div>

                <div class="labels">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="date" name="tanggal_pengembalian" class="form-control"
                        value="{{ $loan->tanggal_pengembalian }}">
                </div>

                <div class="labels">
                    <label for="kode_pbl">Kode PBL</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="text" name="kode_pbl" class="form-control"
                        value="{{ $loan->kode_pbl }}" readonly>
                </div>
            @endforeach

            <!-- Tombol submit -->
            <div class="btn">
                <button onclick="return confirmPengembalian()" type="submit">Kembalikan Barang</button>
                <a href="/dashboard_mahasiswa" style="color: white">kembali</a>
            </div>

    </div>

    </form>
</body>

</html>
