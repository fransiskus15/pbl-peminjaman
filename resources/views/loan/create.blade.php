<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/tool.css') }}" rel="stylesheet">
    <title>Form Peminjaman</title>

    <script>
        function confirmLoan() {
            if (confirm('Apakah Anda yakin ingin melakukan peminjaman?')) {
                document.getElementById('loan-form').submit();
            } else {
                return false;
            }
        }
    </script>

</head>

<body
    style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(img/poltek.jpg) center no-repeat fixed;">
    <header>
        <div class="text-box">
            <h1 id="title">FORM PEMINJAMAN ALAT</h1>
            <hr>
            {{-- <p id="description">Tell us about your experience with South Park</p> --}}
        </div>
    </header>
    <center>
        @if (session('success'))
            <div style="color: rgb(7, 255, 19);">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div style="color: rgb(255, 44, 7);">{{ session('error') }}</div>
        @endif

        {{-- @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
    </center>

    <div class="container">
        <form id="loan-form" action="{{ route('loan.store') }}" method="POST" id="survey-form">
            @csrf

            <div class="labels">
                <label for="email">Email</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="email" name="email" value="{{ old('email') }}"
                    placeholder="MASUKKAN EMAIL ANDA" required autofocus>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label for="nim">NIM</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" name="nim" min="1" placeholder=" NIM" required
                    value="{{ $nim }}" readonly>
            </div>

            <div class="labels">
                <label for="nomor_hp">Nomor HP</label>
            </div>
            <div class="input-tab">
                <input class="input-field" placeholder="+62" type="text" name="nomor_hp"
                    value="{{ old('nomor_hp') }}">
            </div>

            <div class="labels">
                <label for="goods_id">Barang</label>
            </div>
            <div class="input-tab">
                <select class="input-field" name="goods_id">
                    <option value="">-- Pilih Barang --</option>
                    {{-- <option value="mouse">Mouse</option>
                <option value="keyboard">Keyboard</option>
                <option value="monitor">Monitor</option> --}}
                    @foreach ($goods as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="labels">
                <label for="jumlah">Jumlah</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="number" placeholder="1" name="jumlah" value="{{ old('jumlah') }}">
            </div>



            <div class="labels">
                <label for="tanggal_pinjaman">Tanggal Pinjaman</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="date" name="tanggal_pinjaman"
                    value="{{ old('tanggal_pinjaman') }}">
            </div>

            <div class="labels">
                <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="date" name="tanggal_pengembalian"
                    value="{{ old('tanggal_pengembalian') }}">
            </div>

            <div class="labels">
                <label for="kode_pbl">Kode PBL</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" name="kode_pbl" value="{{ old('kode_pbl') }}">
            </div>

            <div class="btn">
                <button onclick="return confirmLoan()" id="submit" type="submit">Pinjam</button>
                <a href="/dashboard_mahasiswa" style="color: white">kembali</a>

            </div>

            @if (Auth::user()->is_admin)
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            @else
                <input type="hidden" name="status" value="pending">
            @endif

        </form>
    </div>
    <footer>
        <div class="contact">
            <a href="https://github.com/linh4" target="_blank">
                <span class="icon"><i class="fa fa-github"></i></span></a>
            <a href="https://codepen.io/linh4/" target="_blank">
                <span class="icon"><i class="fa fa-codepen"></i></span></a>
            <a href="https://www.freecodecamp.org/linh4" target="_blank">
                <span class="icon"><i class="fa fa-free-code-camp"></i></span></a>
        </div>

    </footer>

</body>

</html>
