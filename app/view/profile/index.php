<main id="main">
    <?php foreach ($data['profile'] as $user): ?>

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">
                                Profile
                            </h1>
                            <!-- <span class="color-text-a">Agent Immobiliari</span> -->
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Profile</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $user['nama_lengkap']; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single -->

        <!-- ======= Agent Single ======= -->
        <section class="agent-single">
            <div class="container">
                <div class="row ">
                    <div class="col-sm-12">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <img src="<?= BASEURL; ?>/img/profile/<?= $user['images']; ?>" alt=""
                                    class="agent-avatar img-fluid" style="aspect-ratio: 1/1; object-fit: cover;">

                            </div>
                            <div class="col-md-5 section-md-t3">
                                <div class="agent-info-box">
                                    <div class="agent-title">
                                        <div class="title-box-d">
                                            <h3 class="title-d">
                                                <?= $user['nama_lengkap']; ?>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="agent-content mb-3">
                                        <p class="content-d color-text-a">
                                            Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Est culpa facere consequuntur corporis adipisci dolorem dolorum mollitia
                                            neque in praesentium omnis sit repellendus hic, doloribus a. Ipsum tenetur ex
                                            similique, id eum nihil debitis rerum, tempora provident ad consequatur
                                            accusantium!
                                        </p>
                                        <div class="info-agents color-a">
                                            <p>
                                                <strong>Phone: </strong>
                                                <span class="color-text-a">
                                                    <?= $user['phone']; ?>
                                                </span>
                                            </p>
                                            <p>
                                                <strong>Email: </strong>
                                                <span class="color-text-a">
                                                    <?= $user['email']; ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="socials-footer">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="bi bi-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="bi bi-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="bi bi-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="bi bi-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-b-n mt-2 tampilModalEditProfile" data-bs-toggle="modal"
                                    data-bs-target="#formModalEdit" data-idAkun="<?= $_SESSION['id_akun']; ?>">
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 section-t8">
                        <div class="title-box-d">
                            <?php if ($_SESSION['role'] == 0): ?>
                                <h3 class="title-d">My Properties</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($_SESSION['role'] == 0): ?>
                        <div class="row property-grid grid">
                            <?php foreach ($data['rumah'] as $rumah): ?>
                                <div class="col-md-4">
                                    <div class="card-box-a card-shadow">
                                        <div class="img-box-a">
                                            <img src="<?= BASEURL; ?>/img/rumah/<?= $rumah['image']; ?>" alt=""
                                                class="img-a img-fluid" style="aspect-ratio: 3/4; object-fit: cover;">
                                        </div>
                                        <div class="card-overlay">
                                            <div class="card-overlay-a-content">
                                                <div class="card-header-a">
                                                    <h2 class="card-title-a">
                                                        <a href="#">
                                                            <?= $rumah['tipe']; ?> <br />
                                                            <?= $rumah['alamat']; ?>
                                                    </h2>
                                                </div>
                                                <div class="card-body-a">
                                                    <div class="price-box d-flex">
                                                        <span class="price-a">
                                                            <?php if ($rumah['status'] == 0)
                                                                echo "for sale";
                                                            else
                                                                echo "rent"; ?> | $
                                                            <?= number_format($rumah['harga'], 0, ".", "."); ?>
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
                                                                <?= $rumah['area']; ?>m<sup>2</sup>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title">Beds</h4>
                                                            <span>
                                                                <?= $rumah['beds']; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title">Baths</h4>
                                                            <span>
                                                                <?= $rumah['baths']; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title">Garages</h4>
                                                            <span>
                                                                <?= $rumah['garages']; ?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <nav class="pagination-a">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item <?= ($data['currentPage'] == 1) ? 'disabled' : '' ?>">
                                            <a class="page-link"
                                                href="<?= BASEURL; ?>/profile/index/<?= $data['currentPage'] - 1; ?>"><span
                                                    class="bi bi-chevron-left"></span></a>
                                        </li>
                                        <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                                            <?php if ($i == $data['currentPage']): ?>
                                                <li class="page-item active">
                                                    <a class="page-link" href="<?= BASEURL; ?>/profile/index/<?= $i; ?>"><?= $i; ?></a>
                                                </li>
                                            <?php else: ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?= BASEURL; ?>/profile/index/<?= $i; ?>"><?= $i; ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                        <li
                                            class="page-item <?= ($data['currentPage'] == $data['totalPages']) ? 'disabled' : '' ?>">
                                            <a class="page-link"
                                                href="<?= BASEURL; ?>/profile/index/<?= $data['currentPage'] + 1; ?>"><span
                                                    class="bi bi-chevron-right"></span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            </div>
            </div>
        </section><!-- End Agent Single -->
    <?php endforeach; ?>

</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="formModalEdit" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/profile/edit" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="<?= $user['nama_lengkap']; ?>" placeholder="Nama Lengkap" required>
                    </div>
                    <div class=" mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                            value="<?= $user['email']; ?>" required>
                    </div>

                    <div class=" mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number"
                            value="<?= $user['phone']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Image</label>
                        <input type="hidden" id="backups" name="backups" value="<?= $user['images']; ?>">
                        <input class="form-control" type="file" id="images" name="images">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-b-n">Edit Profile</button>
            </div>
            </form>
        </div>
    </div>
</div>