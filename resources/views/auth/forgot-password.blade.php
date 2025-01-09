<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RPTAR Alumni - Lupa Kata Laluan</title>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
</head>

<body style="background-color: #a12c2f">
    <div class="container-fluid">
        <!-- Baris Luar -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-3">
                        <!-- Baris Bersarang dalam Badan Kad -->
                        <div class="row">
                            <!-- Bahagian Kiri dengan Logo dan Imej Latar Belakang -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="logo-container">
                                        <img src="assets/images/RP.png" alt="Logo">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Lupa Kata Laluan?</h1>
                                        <p class="text-muted">Masukkan alamat emel dan kata laluan baru anda</p>
                                    </div>
                                    <!-- Paparkan ralat jika ada -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Paparkan mesej kejayaan jika ada -->
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <!-- Borang Tetapan Semula Kata Laluan -->
                                    <form method="POST" action="{{ route('password.store') }}" class="user">
                                        @csrf

                                        <!-- Email Field -->
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Alamat Emel..." name="email"
                                                value="" required>
                                        </div>

                                        <!-- Password Field -->
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Kata Laluan Baru" name="password"
                                                required>
                                        </div>

                                        <!-- Confirm Password Field -->
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPasswordConfirmation"
                                                placeholder="Sahkan Kata Laluan Baru" name="password_confirmation"
                                                required>
                                        </div>

                                        <!-- Submit Button -->
                                        <button class="btn btn-danger btn-user btn-block" type="submit">Tetapkan Semula
                                            Kata Laluan</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Kembali ke Log Masuk</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Daftar Akaun Baru!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery-easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
</body>

</html>
