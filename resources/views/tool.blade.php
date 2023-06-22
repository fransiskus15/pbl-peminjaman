<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/tool.css') }}" rel="stylesheet">
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
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <form id="survey-form" method="POST" action="{{ route('tool') }}">
            @csrf

            <div class="labels">
                <label id="name-label" for="email">Email</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="email" name="email"
                    placeholder="MASUKKAN EMAIL ANDA" required autofocus>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label id="number-label" for="nim"> NIM dan Nama Pengaju Alat</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="nim" name="nim" min="1" max="120"
                    placeholder=" NIM/NIK dan Nama Pengaju Peminjaman" required>
                @error('nim')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label id="number-label" for="nomor_hp"> Nomor HP Pengaju Alat</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="nomor_hp" name="nomor_hp" placeholder=" +62" required>
                @error('nomor_hp')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label id="number-label" for="jumlah"> Jumlah</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="number" id="jumlah" name="jumlah" min="1" max="120"
                    placeholder=" 1" required>
                @error('jumlah')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label id="number-label" for="tanggal_pinjaman"> Tanggal pinjaman</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="date" id="tanggal_pinjaman" name="tanggal_pinjaman" placeholder=" 1"
                    required>
                @error('tanggal_pinjaman')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label id="number-label" for="tanggal_pengembalian"> Tanggal pengembalian</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="date" id="tanggal_pengembalian" name="tanggal_pengembalian"
                    placeholder=" 1" required>
                @error('tanggal_pengembalian')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label id="number-label" for="kode_pbl"> Kode PBL.Tuliskan menggunakan huruf kapital, pastikan yang di
                    input kode PBL (bukan judul PBL)</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="kode_pbl" name="kode_pbl" min="1" max="120"
                    placeholder="Contoh PBL-IF003" required>
                @error('kode_pbl')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="labels">
                <label for="dropdown">Jenis Alat</label>
            </div>

            <div class="input-tab">
                <select id="dropdown" name="barang[]">
                    <option disabled value selected>Pilih Alat</option>
                    <option value="mouse">Mouse</option>
                    <option value="keyboard">Keyboard</option>
                    <option value="monitor">Monitor</option>
                </select>
            </div>

            {{-- <div class="input-tab">
                <select id="dropdown" name="barang[]" multiple>
                    <option disabled value selected>Pilih Alat</option>
                    <option value="mouse">Mouse</option>
                    <option value="keyboard">Keyboard</option>
                    <option value="monitor">Monitor</option>
                </select>
            </div> --}}

            <div class="btn">
                <button id="submit" type="submit">Submit</button>
            </div>
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

    {{-- @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif --}}

</body>

</html>
