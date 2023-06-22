<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('img/Background-la-gi.jpg');
            background-size: cover;
            font-family: sans-serif;
        }

        .btn-color {
            background-color: #0e1c36;
            color: #fff;

        }

        .profile-image-pic {
            height: 200px;
            width: 200px;
            object-fit: cover;
        }



        .cardbody-color {
            background-color: #ebf2fa;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="card my-5">

                    <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ route('login') }}">
                        @csrf

                        @if (session('notifikasi'))
                            <div class="form-group">
                                <div class="alert alert-{{ session('type') }}">
                                    {{ session('notifikasi') }}
                                </div>
                            </div>
                        @endif

                        <div class="text-center">
                            <img src="img/login.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <label for="nim">NIM/NIK</label>
                            <input class="form-control @error('nim') is-invalid @enderror" type="number" name="nim"
                                placeholder="NIM/NIK" required autofocus>
                            @error('NIM')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="password" required>
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif



                        <div class="text-center"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100">Masuk</button>
                            <a href="{{ route('register') }}" class="btn btn-link">
                                Belum punya akun? Daftar sekarang
                            </a>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
