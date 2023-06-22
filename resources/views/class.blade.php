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
            <h1 id="title">FORM PEMINJAMAN RUANGAN</h1>
            <hr>
            {{-- <p id="description">Tell us about your experience with South Park</p> --}}
        </div>
    </header>
    <div class="container">
        <form id="survey-form" method="GET">

            <div class="labels">
                <label id="name-label" for="email">Email</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="name" name="name"
                    placeholder="MASUKKAN EMAIL ANDA" required autofocus>
            </div>

            <div class="labels">
                <label id="email-label" for="nama_kegiatan">Nama Kegiatan</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="email" id="email" name="email" placeholder="Nama Kegiatan"
                    required>
            </div>

            <div class="labels">
                <label id="number-label" for="nim"> NIM/NIK dan Nama Pengaju Ruangan</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="number" name="number" min="1" max="120"
                    placeholder=" NIM/NIK dan Nama Pengaju Ruangan" required>
            </div>

            <div class="labels">
                <label id="number-label" for="nim"> Nomor HP Pengaju Ruangan</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="number" name="number" min="1" max="120"
                    placeholder=" +62" required>
            </div>

            <div class="labels">
                <label id="number-label" for="nim"> Bukti Persetujuan Penanggung Jawab Upload Your Supervisor
                    Approval (Lecturer/Supervisor/Project Manager)
                    Upload bukti persetujuan anda dari Penanggung Jawab (Dosen Pengajar/Pembimbing/Manpro)
                </label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="file" id="upload" name="number" min="1" max="120"
                    required>
            </div>

            <div class="labels">
                <label id="number-label" for="nim"> Kode PBL.Tuliskan menggunakan huruf kapital, pastikan yang di
                    input kode PBL (bukan judul PBL)</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="number" name="number" min="1" max="120"
                    placeholder="Contoh PBL-IF003 " required>
            </div>

            <div class="labels">
                <label for="dropdown">Ruangan
                    Peminjaman lebih dari 1 (satu) ruangan, harap mengajukan peminjaman lagi</label>
            </div>
            <div class="input-tab">
                <select id="dropdown" name="site">
                    <option disabled value selected>Pilih Ruangan</option>
                    <option value="web">601 - Workspace Multimedia</option>
                    <option value="hulu">601 - Workspace Virtual Reality</option>
                    <option value="youtube">604 - Workspace Multimedia</option>
                    <option value="tv">606 - Workspace Rendering</option>
                    <option value="other">607 - Lab Motion Capture</option>
                    <option value="other">608 - Workspace Rendering</option>
                    <option value="other">702 - Lab Komputer/Praktikum</option>
                    <option value="other">704 - Workspace Software Development</option>
                    <option value="other">705 - Workspace Animation Production</option>
                    <option value="other">706 - Workspace Software Development</option>
                    <option value="other">707 - Workspace Creative Art Studio</option>
                    <option value="other">805 - Workspace Data Science</option>
                    <option value="other">RTF.III. 1 - Studio Fotografi</option>
                    <option value="other">RTF.III.3 - Studio Broadcasting</option>
                    <option value="other">RTF.III.6 - Workspace Editting</option>
                    <option value="other">RTF.IV.1 - Lab Clay Modelling</option>
                    <option value="other">RTEIV2 _I ah Animasi</option>
                    <option value="other">RTF.IV.4 - Lab Audio</option>
                    <option value="other">RTF.V.1 - Workspace Photogrammetry</option>
                    <option value="other">RTF.V.2 - Workspace GIS</option>
                    <option value="other">RTF.V.4 - Workspace Remote Sensing</option>
                    <option value="other">TA.X.3 - Cyber Physical System Security Lab</option>
                    <option value="other">TA.X.4 - Workspace Attack and Defense</option>
                    <option value="other">TAXI.4 - Workspace Data Security and Privacy</option>
                    <option value="other">TA.XI.5 - Workspace Cyber Forensic</option>
                    <option value="other">Technopreneur Lt.3 - Mini Theater</option>
                    <option value="other">Technopreneur Lt.3 - Workspace Animasi (Jauh dari Lift)</option>
                    <option value="other">Technopreneur Lt.3 - Workspace Game Development dan VR</option>
                    <option value="other">Technopreneur Lt.3 - Workspace Multimedia (Dekat dengan Lift)</option>
                    <option value="other">TA.XII3A - Ruang Kelas</option>
                    <option value="other">TAXI.3 - Ruang Kelas</option>
                </select>
            </div>

            <div class="labels">
                <label id="number-label" for="nim">Tanggal Kegiatan.(Peminjaman lebih dari 1 (satu) hari, harap
                    mengajukan peminjaman lagi.)</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="date" id="number" name="number" min="1"
                    max="120" required>
            </div>

            <div class="labels">
                <label for="dropdown">Jam Penggunaan (pastikan datang tepat waktu, serta menggunakan ruangan sesuai
                    dengan waktu yang dipilih. Jika terdapat pelanggaran maka akan dikenakan punishment berupa SP. Mari
                    patuhi peraturan yang berlaku teman-teman 😁).</label>
            </div>
            <div class="input-tab">
                <select id="dropdown" name="seasons">
                    <option disabled value selected>Pilih jam </option>
                    <option value="<=5">08:00-12:00WIB</option>
                    <option value="<=10">13:00-17:00WIB</option>
                    <option value="<=15">08:00-12:00WIB(Khusu Kelas Karywan)</option>
                </select>
            </div>

            <div class="labels">
                <label id="number-label" for="nim">Nama-Nama Pengguna Ruangan
                    Selain pengusul serta nama yang di list tidak diperkenankan menggunakan ruangan !!!</label>
            </div>
            <div class="input-tab">
                <input class="input-field" type="text" id="number" name="number"
                    placeholder="Masukan nama pengguna" min="1" max="120" required>
            </div>

            <div class="labels">
                <label for="dropdown">Penanggung Jawab Kegiatan
                    Dosen Pengajar/Pembimbing/Manpro😎</label>
            </div>
            <div class="input-tab">
                <select id="dropdown" name="seasons">
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
                    <option value="<=15">Selly Artaty Zega, S.ST., M.Sc</option>
                    <option value="<=15">Supardianto, S.ST.M.Eng.</option>
                    <option value="<=15">Sandi Prasetyaningsih, S.ST., M. Media</option>
                    <option value="<=15">Sudra Irawan, S.Pd.Si., M.Sc</option>
                    <option value="<=15">Sartikha, S. ST., M.Eng</option>
                    <option value="<=15">Liony Lumombo, S.ST., M.IDes</option>
                    <option value="<=15">Arta Ulv Siahaan. S.Pd. M.Pd</option>
                    <option value="<=15">Oktavianto Gustin, S.T., M.T</option>
                    <option value="<=15">Ahmad Hamim Thohari, S.S. T., M.T.</option>
                    <option value="<=15">Arif Rozigin, S.Pd, M.Sc</option>
                    <option value="<=15">Nelmiawati, B.CS., M.Comp.Sc</option>
                    <option value="<=15">Muhammad Zainuddin Lubis, S.l.k, M.Si</option>
                    <option value="<=15">Wenang Anurogo, S.Si., M.Sc.</option>
                    <option value="<=15">Muchamad Fajri Amirul Nasrullah, S.ST., M.Sc</option>
                    <option value="<=15">Hamdani Arif, S.Pd., M.Sc</option>
                    <option value="<=15">Maide Fani. S.Pd..M.Kom.</option>
                    <option value="<=15">Dr. Fandy Neta, S.Pd., M.Pd.T.</option>
                    <option value="<=15">Luthfiya Ratna Sari, S.Si., M.T.</option>
                    <option value="<=15">Rina Yulius, S.Pd., M.Eng</option>
                    <option value="<=15">Satriya Bayu Aji, S.S., M. Hum.</option>
                    <option value="<=15">Siti Noor Chayati, S. T., M.Sc</option>
                    <option value="<=15">Farouki Dinda Rassarandi, S.T., M.Eng</option>
                </select>
            </div>

            <div class="btn">
                <button id="submit" type="submit">Submit</button>
                <a href="/dashboard_mahasiswa" style="color: white">kembali</a>
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

</body>

</html>
