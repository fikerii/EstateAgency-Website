<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Our Amazing Properties</h1>
                        <span class="color-text-a"></span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Properties Display
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                <?php if ($_SESSION['cari'] == 1): ?>
                    <div class="col-sm-12">
                        <div class="grid-option">
                            <a href="<?= BASEURL; ?>/display/resetFilter" class="btn btn-b-n">Reset
                                Filter</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php foreach ($data['rumah'] as $rmh): ?>
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="<?= BASEURL; ?>/img/rumah/<?= $rmh['image'] ?>" alt="" class="img-a img-fluid"
                                    style="aspect-ratio: 3/4; object-fit: cover;">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="#">
                                                <?= $rmh['tipe']; ?> <br />
                                                <?= $rmh['alamat']; ?>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">
                                                <?php if ($rmh['status'] == 0)
                                                    echo "for sale";
                                                else
                                                    echo "rent"; ?> | $
                                                <?= number_format($rmh['harga'], 0, ".", "."); ?>
                                            </span>
                                        </div>
                                        <a href="" class="link-a">Click here to view
                                            <span class="bi bi-chevron-right"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Area</h4>
                                                <span>
                                                    <?= $rmh['area']; ?>m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span>
                                                    <?= $rmh['beds']; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Baths</h4>
                                                <span>
                                                    <?= $rmh['baths']; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Garages</h4>
                                                <span>
                                                    <?= $rmh['garages']; ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="pagination-a">
                            <ul class="pagination justify-content-end">
                                <li class="page-item <?= ($data['currentPage'] == 1) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= BASEURL; ?>/display/index/<?= $data['currentPage'] - 1; ?>"><span
                                            class="bi bi-chevron-left"></span></a>
                                </li>
                                <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                                    <?php if ($i == $data['currentPage']): ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="<?= BASEURL; ?>/display/index/<?= $i; ?>"><?= $i; ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/display/index/<?= $i; ?>"><?= $i; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <li
                                    class="page-item <?= ($data['currentPage'] == $data['totalPages']) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= BASEURL; ?>/display/index/<?= $data['currentPage'] + 1; ?>"><span
                                            class="bi bi-chevron-right"></span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
    </section><!-- End Property Grid Single-->

</main><!-- End #main -->