<!DOCTYPE html>
<html lang="en">

<head>
    <title>HTSA | Daftar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="img/logo.png" />

    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">

</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Sign up
                    </span>
                </div>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form class="login100-form validate-form" action="/register" method="POST">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Nama Lengkap is required">
                        <span class="label-input100 col-lg-2">Nama lengkap</span>
                        <input class="input100" type="text" name="name" placeholder="Nama Lengkap">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100 col-lg-2">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100 col-lg-2">Password</span>
                        <input class="input100" type="text" name="pass" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Nomor Telepon is required">
                        <span class="label-input100 col-lg-2">Nomor Telepon</span>
                        <input class="input100" type="number" min="0" name="notelp" placeholder="Nomor Telepon">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate="Alamat is required">
                        <span class="label-input100 col-lg-2">Alamat</span>
                        <textarea name="alamat" id="" cols="30" rows="10" class="input100" placeholder="Alamat lengkap"></textarea>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn m-auto" type="submit"> Register</button>
                    </div>
                    <a href="/login" class="m-auto pt-3"> <u>Already have account</u></a>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>

    <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/login/vendor/select2/select2.min.js"></script>

    <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>

    <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>

    <script src="assets/login/js/main.js"></script>

</body>

</html>