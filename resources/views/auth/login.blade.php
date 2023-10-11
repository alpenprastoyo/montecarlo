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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/image/logo.png') }}">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <img src="../asset/image/logo.png" class="rounded mx-auto d-block" alt="...">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 fs-3 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="username" name="email" name="email" value="{{ old('email') }}"  placeholder="Username" autocomplete="off" minlength="6" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" minlength="6" required>
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="../user/register.php">Belum Punya Akun? Buat Akun!</a>
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