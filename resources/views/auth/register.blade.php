<section class="vh-100 bg-image"
    style="background: url('img/bgregis3.jpg');  margin: 0;
  padding: 0; background-size: cover; font-family: sans-serif;">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Buat Akun Anda</h2>

                            <form method="POST" action="{{ route('register') }}">

                                @csrf

                                <div class="form-outline mb-4">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="number" placeholder="Masukkan NIM anda" name="nim"
                                        class="form-control form-control-lg" required autofocus />

                                    @error('nim')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label for="name" class="form-label">NAMA</label>
                                    <input type="text" placeholder="Masukkan Nama anda" name="name"
                                        class="form-control form-control-lg" required />

                                    @error('name')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="form-outline mb-4">
                                    <label class="form-label" for="level">LEVEL</label>
                                    <select name="level" id="level">
                                        <option value="admin">Admin</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                    @error('level')
                                        <span>{{ $message }}</span>
                                @enderror
                        </div> --}}



                                <div class="form-outline mb-4">
                                    <label for="password" class="form-label">PASSWORD</label>
                                    <input type="password" placeholder="Masukkan Password anda" name="password"
                                        id="form3Example4cdg" class="form-control form-control-lg" required />
                                    <span toggle="#password" class="toggle-password"></span>

                                    <script>
                                        const togglePassword = document.querySelector('.toggle-password');
                                        const passwordInput = document.querySelector('#password');

                                        togglePassword.addEventListener('click', function() {
                                            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordInput.setAttribute('type', type);
                                            this.classList.toggle('show');
                                        });
                                    </script>
                                </div>

                                <div class="form-outline mb-4">
                                    <label for="password" class="form-label">KONFIRMASI PASSWORD</label>
                                    <input type="password" placeholder="Ulangi Password anda"
                                        name="password_confirmation" id="form3Example4cdg"
                                        class="form-control form-control-lg" required />

                                    @error('password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Daftar</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Sudah Punya Akun? <a
                                        href="{{ route('login') }}" class="fw-bold text-body"><u>Masuk Disini</u></a>
                                </p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
