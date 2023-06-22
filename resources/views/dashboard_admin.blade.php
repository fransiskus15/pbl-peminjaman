<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard staf</title>
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                document.getElementById('logout-form').submit();
            } else {
                return false;
            }
        }
    </script>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a style="margin-left: 3rem" class="sidebar-brand d-flex align-items-center justify-content-center"
                href="index.html">
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-primary"></i>
                </div>

                <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }}
                    ({{ Auth::user()->level }})</div>
            </a>



            <div class="sidebar-heading my-0">
                <!--Features-->
            </div>
            <nav class="sidebar">
                <ul>
                    <li><a href="#">Dashboard Admin</a></li>
                    <li>
                        <a href="#" class="feat-btn">Tambah
                            <span class="fas fa-caret-down first"></span>
                        </a>
                        <ul class="feat-show">
                            <li><a href="/admin/goods">Alat</a></li>
                            <li><a href="#">ruangan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="serv-btn">Peminjaman
                            <span class="fas fa-caret-down second"></span>
                        </a>
                        <ul class="serv-show">
                            <li><a href="/admin/loans">Alat</a></li>
                            <li><a href="#">element</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="pemi-btn">Pengembalian
                            <span class="fas fa-caret-down three"></span>
                        </a>
                        <ul class="pemi-show">
                            <li><a href="/admin/returns">Alat</a></li>
                            <li><a href="#">Ruangan</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/riwayat-peminjaman">Riwayat Peminjaman</a></li>
                    {{-- <li><a href="#">overview</a></li>
                    <li><a href="#">Portofolio</a></li> --}}
                    <li>
                        <div style="margin-left: 1rem">
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button onclick="return confirmLogout()" type="submit" class="logout_btn"
                                    style="align: right; margin-top: -1rem; color: red">Keluar</button>
                            </form>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- form  -->
            <div class="content"
                style="background: url(img/poltek.jpg) no-repeat;  margin-left: 250px; 
    background-position: center; background-size: cover; height: 100vh;
    transition: 0.5s;">
            </div>
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="js/ruang-admin.min.js"></script>
            <script src="vendor/chart.js/Chart.min.js"></script>
            <script src="js/demo/chart-area-demo.js"></script>

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
