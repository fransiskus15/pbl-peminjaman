<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/tool.css') }}" rel="stylesheet">
    <title>Form Peminjaman Ruangan</title>
</head>

<body
    style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(img/poltek.jpg) center no-repeat fixed;">

    <header>
        <div class="text-box">
            <h1 id="title">FORM PEMINJAMAN RUANGAN</h1>
            <hr>
            {{-- <p id="description">Tell us about your experience with South Park</p> --}}
        </div>
    </header>

    <center>
        @if (session('success'))
            <div style="color: rgb(7, 255, 19);">{{ session('success') }}</div>
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
        <form method="POST" action="{{ route('room_bookings.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="labels">
                <label for="email">Email</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="MASUKKAN EMAIL ANDA" required autofocus>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>


            <div class="labels">
                <label for="nama_kegiatan">Nama Kegiatan</label>
            </div>
            <div class="input-tab">
                <input id="nama_kegiatan" type="text" class="input-field" name="nama_kegiatan" placeholder="PBL"
                    value="{{ old('nama_kegiatan') }}" required>
            </div>


            <div class="labels">
                <label for="nim">NIM</label>
            </div>
            <div class="input-tab">
                <input id="nim" type="text" class="input-field" name="nim" value="{{ old('nim') }}"
                    placeholder="Masukkan NIM Anda" required>
            </div>


            <div class="labels">
                <label for="nomor_hp">Nomor HP Pengaju Ruangan</label>
            </div>
            <div class="input-tab">
                <input id="nomor_hp" type="text" class="input-field" name="nomor_hp" value="{{ old('nomor_hp') }}"
                    placeholder="+62" required>
            </div>


            <div class="labels">
                <label for="bukti_persetujuan">Bukti Persetujuan Penanggung Jawab Upload Your Supervisor
                    Approval (Lecturer/Supervisor/Project Manager)
                    Upload bukti persetujuan anda dari Penanggung Jawab (Dosen Pengajar/Pembimbing/Manpro)</label>
            </div>
            <div class="input-tab">
                <input class="input-field" required placeholder="Upload foto" type="file"
                    accept="image/png, image/jpg, img/jpeg" id="bukti_persetujuan" name="bukti_persetujuan"
                    class="form-control @error('bukti_persetujuan') is-invalid @enderror">
                @error('bukti_persetujuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="labels">
                <label for="kode_pbl">Kode PBL.Tuliskan menggunakan huruf kapital, pastikan yang di
                    input kode PBL (bukan judul PBL)</label>
            </div>
            <div class="input-tab">
                <input id="kode_pbl" type="text" class="input-field" name="kode_pbl" value="{{ old('kode_pbl') }}"
                    placeholder="PBL-004" required>
            </div>


            {{-- <div class="form-group">
                                <label for="ruangan_id">Ruangan</label>
                                <select class="form-control @error('ruangan_id') is-invalid @enderror" id="ruangan_id"
                                    name="ruangan_id" required>
                                    <option value="">Pilih Ruangan</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                                @error('ruangan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

            <div class="labels">
                <label for="ruangan_id">Ruangan
                    Peminjaman lebih dari 1 (satu) ruangan, harap mengajukan peminjaman lagi</label>
            </div>
            <div class="input-tab">
                <input placeholder="Contoh: RTF.III. 1 - Studio Fotografi" class="input-field" type="text"
                    name="ruangan_id" id="ruangan_id">
            </div>


            <div class="labels">
                <label for="tanggal_kegiatan">Tanggal Kegiatan.(Peminjaman lebih dari 1 (satu) hari, harap
                    mengajukan peminjaman lagi.)</label>
            </div>
            <div class="input-tab">
                <input id="tanggal_kegiatan" type="date" class="input-field" name="tanggal_kegiatan"
                    value="{{ old('tanggal_kegiatan') }}" required>
            </div>


            <div class="labels">
                <label for="jam_penggunaan">Jam Penggunaan (pastikan datang tepat waktu, serta menggunakan ruangan
                    sesuai
                    dengan waktu yang dipilih. Jika terdapat pelanggaran maka akan dikenakan punishment berupa SP. Mari
                    patuhi peraturan yang berlaku teman-teman 😁).</label>
            </div>
            <div class="input-tab">
                <select id="jam_penggunaan" name="jam_penggunaan" class="input-field" required>
                    <option value="">Pilih Jam Penggunaan</option>
                    <option value="08:00-12:00WIB">08:00-12:00WIB</option>
                    <option value="13:00-17:00WIB">13:00-17:00WIB</option>
                    <option value="08:00-12:00WIB(Khusu Kelas Karywan)">08:00-12:00WIB(Khusu Kelas
                        Karywan)</option>
                </select>
                @error('jam_penggunaan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="labels">
                <label for="nama_pengguna">Nama-Nama Pengguna Ruangan
                    Selain pengusul serta nama yang di list tidak diperkenankan menggunakan ruangan !!!</label>
            </div>
            <div class="input-tab">
                <input id="nama_pengguna" type="text" class="input-field" name="nama_pengguna"
                    placeholder="Masukkan Nama Pengguna" value="{{ old('nama_pengguna') }}" required>
            </div>


            <div class="labels">
                <label for="penanggung_jawab">Penanggung Jawab Kegiatan
                    Dosen Pengajar/Pembimbing/Manpro😎</label>
            </div>
            {{-- <div class="input-tab">
                <select id="penanggung_jawab" name="penanggung_jawab" class="input-field" required>
                    <option disabled value selected>Penanggung jawab </option>
                    <option value="<=5">Ari Wibowo,ST, MT</option>
                    <option value="<=10">Uuf Brajawidagda, S.T., M.T., Ph.D</option>
                    <option value="<=15">Metta Santiputri, S.T., M.Sc, Ph.D</option>
                    <option value="<=15">Hilda Widyastuti, S.T., M.T.</option>
                    <option value="<=15">Riwinoto,ST.M.Kom</option>
                    <option value="<=15">Andy Triwinarko,ST, M.T., Ph.D</option>
                    <option value="<=15">Evaliata Br. Sembiring, S.Kom., M.Cs</option>
                    <option value="<=15">Nur Cahyono Kushardianto,S.Si., M.T., M.Sc</option>
                    <option value="<=15">Afdhol Dzikri, S.ST., M.T</option>
                    <option value="<=15">Agus Fatulloh, S.T., M.T</option>
                    <option value="<=15">Condra Antoni,SS, M.A</option>
                    <option value="<=15">Miratul Khusna Mufida,S.ST, M.Sc</option>
                    <option value="<=15">Mira Chandra Kirana, S.T., M.T</option>
                    <option value="<=15">Gendhy Dwi Harlyan, S.Sn. M.Sn</option>
                    <option value="<=15">Nur Zahrati Janah, S. Kom, M.Sc</option>
                    <option value="<=15">Happy Yugo Prasetiya, S.Sn., M.Sn</option>
                    <option value="<=15">Yeni Rokhayati, S.Si., M.Sc</option>
                    <option value="<=15">Dwi Ely Kurniawan, S.Pd., M.Kom</option>
                    <option value="<=15">Maria, S.ST</option>
                </select>
                @error('penanggung_jawab')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="input-tab">
                <input id="penanggung_jawab" type="text" class="input-field" name="penanggung_jawab"
                    placeholder="Masukan nama penanggung jawab" value="{{ old('penanggung_jawab') }}" required>
            </div>

            <div class="btn">
                <button id="submit" type="submit">Submit</button>
                <a href="/dashboard_mahasiswa" style="color: white">kembali</a>
            </div>
        </form>
    </div>

</body>

</html>
