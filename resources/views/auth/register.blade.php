<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RPTAR Alumni</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <!-- Left Section with Logo and Background Image -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="assets/images/login3.png" class="w-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="logo-container">
                                        <img src="assets/images/RP.png" alt="Logo">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register Now!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="name" placeholder="Full Name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" placeholder="Email Address" name="email"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="Password" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="Confirm_Password" placeholder="Confirm Password"
                                                name="password_confirmation" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="form-check-input" id="terms">
                                                <label class="form-check-label" for="terms">
                                                    I agree all statements in <a href="#"
                                                        style="text-decoration: none">Terms of
                                                        Service</a>
                                                </label>
                                            </div>

                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Register</button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an Account?</a>
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
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
