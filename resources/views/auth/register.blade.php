<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skripsi Zidane</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/image/logo.png') }}">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <img width="100" height="100" src="../asset/image/logo.png" class="rounded mx-auto d-block" alt="...">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 fs-3 mb-4">Register</h1>
                                    </div>
                                    <form class="user" action="{{ route('register') }}" method="POST">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!-- Create User Form -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3 row">
                                                    <label for="username"
                                                        class="col-sm-4 col-form-label text-gray-900">Email</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <input type="email"
                                                            title="Minimal 6 karakter dan dapat disertai dengan kombinasi huruf besar (kapital), huruf kecil, dan angka."
                                                            class="form-control border-bottom border-success-subtle"
                                                            id="email" name="email" maxlength="2000" value="{{ old('email') }}"
                                                            autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="password"
                                                        class="col-sm-4 col-form-label text-gray-900">Password</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" pattern="[A-Za-z0-9]{6,}"
                                                            title="Minimal 6 karakter dan dapat disertai dengan kombinasi huruf besar (kapital), huruf kecil, dan angka."
                                                            class="form-control border-bottom border-success-subtle"
                                                            id="password" name="password" autocomplete="off"  required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="password"
                                                        class="col-sm-4 col-form-label text-gray-900">Ulang
                                                        Password</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" pattern="[A-Za-z0-9]{6,}"
                                                            title="Minimal 6 karakter dan dapat disertai dengan kombinasi huruf besar (kapital), huruf kecil, dan angka."
                                                            class="form-control border-bottom border-success-subtle"
                                                            id="password_confirmation" name="password_confirmation"
                                                            autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="nama"
                                                        class="col-sm-4 col-form-label text-gray-900">Nama</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control border-bottom border-success-subtle"
                                                            id="nama" name="name" value="{{ old('name') }}" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="jenis_kelamin"
                                                        class="col-sm-4 col-form-label text-gray-900">Jenis
                                                        Kelamin</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <select name="jenis_kelamin" id="jenis_kelamin"
                                                            class="form-control btn btn-light dropdown-toggle col-sm-12"
                                                            required>
                                                            <option value="" selected>Pilih Jenis Kelamin
                                                            </option>
                                                            <option value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="usia"
                                                        class="col-sm-4 col-form-label text-gray-900">Usia</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-4">
                                                        <input value="{{ old('usia') }}" type="number"
                                                            class="form-control border-bottom border-success-subtle"
                                                            id="usia" name="usia" maxlength="2"
                                                            autocomplete="off" required>
                                                    </div>
                                                    <label for="tahun"
                                                        class="col-sm-3 col-form-label text-gray-900">Tahun</label>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="jenis_perusahaan"
                                                        class="col-sm-4 col-form-label text-gray-900">Jenis
                                                        Perusahaan</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <select name="jenis_perusahaan" id="jenis_perusahaan"
                                                            class="btn btn-light dropdown-toggle col-sm-12" required>
                                                            <option value="" selected>Pilih Jenis Perusahaan
                                                            </option>
                                                            <option value="Konsultan">Konsultan</option>
                                                            <option value="Kontraktor">Kontraktor</option>
                                                            <option value="Pemerintahan">Pemerintahan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="jabatan"
                                                        class="col-sm-4 col-form-label text-gray-900">Jabatan</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <input value="{{ old('jabatan') }}" type="text"
                                                            class="form-control border-bottom border-success-subtle"
                                                            id="jabatan" name="jabatan" autocomplete="off"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="pengalaman_kerja"
                                                        class="col-sm-4 col-form-label text-gray-900">Pengalaman
                                                        Kerja</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="number"
                                                            class="form-control border-bottom border-success-subtle"
                                                            id="pengalaman_kerja" value="{{ old('pengalaman_kerja') }}" name="pengalaman_kerja"
                                                            maxlength="2" autocomplete="off" required>
                                                    </div>
                                                    <label for="tahun"
                                                        class="col-sm-3 col-form-label text-gray-900">Tahun</label>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="pendidikan_terakhir"
                                                        class="col-sm-4 col-form-label text-gray-900">Pendidikan
                                                        Terakhir</label>
                                                    <label for=""
                                                        class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                                    <div class="col-sm-7">
                                                        <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                                            class="btn btn-light dropdown-toggle col-sm-12" required>
                                                            <option value="" selected>Pilih Pendidikan Terakhir
                                                            </option>
                                                            <option value="D3">D3</option>
                                                            <option value="D4">D4</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" name="daftar"
                                                    class="btn btn-primary btn-icon-split float-right mr-2">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-arrow-right   "></i>
                                                    </span>
                                                    <span class="text fs-6">Daftar</span>
                                                </button>

                                              

                                                <div class="col-4">
                                                    <img src="" alt="">
                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                    </form>

                                    <div style="padding-top:50px" class="text-center">
                                        <a  href="{{ route('login') }}">Sudah Punya Akun? Login!</a>
                                    </div>
                                </div>
                                <footer class="sticky-footer bg-white">
                                    <div class="container my-auto">
                                        <div class="copyright text-center my-auto">
                                            <span>Hak Cipta &copy; Zidane Abdullah (I0119170) - <?= date('Y') ?></span>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/sb-admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
