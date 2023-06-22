<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <title>Dashboard Mahasiswa</title>

    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logout-form').submit();
            } else {
                return false;
            }
        }
    </script>

</head>

<body>

    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>dashboard <span>mahasiswa</span></h3>
        </div>
        <div class="right_area">
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button onclick="return confirmLogout()" type="submit" class="logout_btn"
                    style="align: right; margin-top: -1rem">Keluar</button>
            </form>
        </div>
    </header>

    {{-- sidebar --}}
    <div class="sidebar">
        <center>
            <img src="img/login.png" alt="b" class="profile_image">
            <h4>{{ Auth::user()->name }} ({{ Auth::user()->level }}) </h4>
        </center>
        <a href="/dashboard_mahasiswa"><i class="fa-solid fa-house"></i><span>Beranda</a>
        <div class="dropdown">
            <a href="/dashboard_mahasiswa"><i class="fa-solid fa-caret-down"></i><span>Peminjaman</span></a>
            <div class="dropdown-content">
                <a href="/loan/create"><i class="fa-solid fa-toolbox"></i><span>Alat</span></a>
                <a href="/room_bookings/create"><i class="fa-solid fa-landmark"></i><span>Ruangan</span></a>
            </div>
        </div>
        {{-- <li>
            <a href="#" class="serv-btn">Peminjaman
                <span class="fas fa-caret-down second"></span>
            </a>
            <ul class="serv-show">
                <li><a href="/admin/loans">Alat</a></li>
                <li><a href="#">element</a></li>
            </ul>
        </li> --}}
        <a href="/riwayat-peminjaman"><i class="fa-solid fa-clock-rotate-left"></i><span>Riwayat Peminjaman</span></a>

        <div class="dropdown">
            <a href="/dashboard_mahasiswa"><i class="fa-solid fa-backward"></i><span>Pengembalian</span></a>
            <div class="dropdown-content">
                <a href="/loan/return"><i class="fa-solid fa-toolbox"></i><span>Alat</span></a>
                <a href="#"><i class="fa-solid fa-landmark"></i><span>Ruangan</span></a>
            </div>
        </div>

        <a href="#"><i class="fa-solid fa-video"></i><span>Tutorial</span></a>
        <a href="/status"><i class="fa-solid fa-check"></i><span>Status Peminjaman</span></a>





        {{-- <a href="/loan/return"><i class="fa-solid fa-backward"></i><span>Pengembalian</span></a> --}}
    </div>

    <div class="content"
        style="background: url(img/poltek.jpg) no-repeat;  margin-left: 250px; 
    background-position: center; background-size: cover; height: 100vh;
    transition: 0.5s;">
    </div>

    <script>
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggleClass("show");
            $('nav ul .first').toggleClass("rotate");
        });
        $('.serv-btn').click(function() {
            $('nav ul .serv-show').toggleClass("show1");
            $('nav ul .second').toggleClass("rotate");
        });
        $('.pemi-btn').click(function() {
            $('nav ul .pemi-show').toggleClass("show2");
            $('nav ul .three').toggleClass("rotate");
        });
        $('nav ul li').click(function() {
            $(this).addClass("active").siblings().removeClass("active");
        });
    </script>
</body>

</html>
