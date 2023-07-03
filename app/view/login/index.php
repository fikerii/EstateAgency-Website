<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EstateAgency Bootstrap Template - Index</title>

    <link href="<?= BASEURL; ?>/img/favicon.png" rel="icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="<?= BASEURL; ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= BASEURL; ?>/css/style.css" rel="stylesheet">
</head>


<body>

    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-4">

            </div>
        </div>
        <div class="row">

            <div class="col-md-6 my-auto">
                <a class="fs-1 text-brand" href="">Estate<span class="color-b">Agency</span></a>
                <h6 class="fs-6 text-brand text-body-secondary">Comfort and Quality Living</h6>
            </div>

            <div class="col-md-6 p-5 my-auto bg-body-tertiary rounded-5">
                <h2 class="color-a fs-2 mb-3">LOGIN</h2>
                <?php Flasher::flash(); ?>

                <form action="<?= BASEURL; ?>/login/validasi" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="pb-2" for="username">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control form-control-lg form-control-a" placeholder="Your Username"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="pb-2" for="pw">Password</label>
                                <input name="pw" id="pw" type="password"
                                    class="form-control form-control-lg form-control-a" placeholder="Your Password"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="pb-2">Belum punya akun?<a href="<?= BASEURL; ?>/registrasi"
                                    class="btn color-b py-0">Sign Up</a></p>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-a">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>/js/script.js"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="<?= BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASEURL; ?>/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= BASEURL; ?>/js/main.js"></script>

</body>

</html>