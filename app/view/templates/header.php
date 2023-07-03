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

    <!-- ======= Property Search Section ======= -->
    <div class="click-closed"></div>
    <!--/ Form Search Star /-->
    <div class="box-collapse">
        <div class="title-box-d">
            <h3 class="title-d">Search Property</h3>
        </div>
        <span class="close-box-collapse right-boxed bi bi-x"></span>
        <div class="box-collapse-wrap form">
            <form action="<?= BASEURL; ?>/display/cari" method="POST" class="form-a">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label class="pb-2" for="pilihan_tipe">Tipe</label>
                            <select class="form-control form-select form-control-a" id="pilihan_tipe" name="tipe">
                                <option value="Classic">Classic</option>
                                <option value="Modern">Modern</option>
                                <option value="Minimalis">Minimalis</option>
                                <option value="Nature">Nature</option>
                                <option value="Futuristik">Futuristik</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group mt-3">
                            <label class="pb-2" for="cari_alamat">Alamat</label>
                            <input type="text" id="cari_alamat" name="alamat"
                                class="form-control form-control-lg form-control-a" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group mt-3">
                            <label class="pb-2" for="min_area">Min. Area</label>
                            <input type="text" id="min_area" name="min_area"
                                class="form-control form-control-lg form-control-a" placeholder="Minimum">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group mt-3">
                            <label class="pb-2" for="max_area">Max. Area</label>
                            <input type="text" id="max_area" name="max_area"
                                class="form-control form-control-lg form-control-a" placeholder="Maximum">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group mt-3">
                            <label class="pb-2" for="min_harga">Min. Harga</label>
                            <input type="text" id="min_harga" name="min_harga"
                                class="form-control form-control-lg form-control-a" placeholder="Minimum">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group mt-3">
                            <label class="pb-2" for="max_harga">Max. Harga</label>
                            <input type="text" id="max_harga" name="max_harga"
                                class="form-control form-control-lg form-control-a" placeholder="Maximum">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 ">
                        <label for="" class="pb-2">Cari Berdasarkan</label>
                        <br />
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="kategori" id="kategori1" value="tipe"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="kategori1">Tipe</label>
                            <input type="radio" class="btn-check" name="kategori" id="kategori4" value="alamat"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="kategori4">Alamat</label>

                            <input type="radio" class="btn-check" name="kategori" id="kategori2" value="area"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="kategori2">Area</label>

                            <input type="radio" class="btn-check" name="kategori" id="kategori3" value="harga"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="kategori3">Harga</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-b">Search Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- End Property Search Section -->>

    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
                aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>

            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/home/index">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="<?= BASEURL; ?>/display/index">Display</a>
                    </li>
                    <?php if ($_SESSION['role'] == 0): ?>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= BASEURL; ?>/rumah/index">Table</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= BASEURL; ?>/profile/index">Profile</a>
                    </li>
                </ul>
            </div>

            <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse me-2"
                data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                <i class="bi bi-search"></i>
            </button>
            <a href="<?= BASEURL; ?>/home/logout" class="btn fs-4">
                <i class="bi bi-box-arrow-right"></i>
            </a>

        </div>
    </nav><!-- End Header/Navbar -->