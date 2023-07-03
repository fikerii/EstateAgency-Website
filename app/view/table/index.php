<!-- ======= Intro Single ======= -->
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Table Data Rumah</h1>
                    <span class="color-text-a"></span>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <div class="position-absolute">
                        <?php Flasher::flash(); ?>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Table
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section><!-- End Intro Single-->

<section class="section-services">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-b-n tampilModalTambah" data-bs-toggle="modal"
                    data-bs-target="#formModal">
                    Tambah Data Rumah
                </button>
            </div>
            <div class="col-lg-6">
                <a class="btn btn-b-n float-end" href="<?= BASEURL; ?>/rumah/cetak" target="_blank"
                    role="button">Cetak</a>
            </div>
            <!-- <div class="col-lg-6">
                <form action="<= BASEURL; ?>/rumah/cari" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" id="keyword"
                            placeholder="cari rumah..." aria-label="cari rumah..."
                            aria-describedby="tombolCari">
                        <button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </form>
            </div> -->
        </div>
        <div class="row mb-4">
            <div class="div">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Area</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kamar</th>
                            <th scope="col">Kamar Mandi</th>
                            <th scope="col">Garasi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['rumah'] as $rmh): ?>
                            <tr>
                                <th scope="row">
                                    <?= ($data['currentPage'] - 1) * 6 + $i ?>
                                </th>
                                <td>
                                    <?= $rmh['tipe']; ?>
                                </td>
                                <td>
                                    <?= $rmh['alamat']; ?>
                                </td>
                                <td>
                                    <?= $rmh['area'] . 'm²'; ?>
                                </td>
                                <td>
                                    <?= '$ ' . number_format($rmh['harga'], 0, ".", "."); ?>
                                </td>
                                <td>
                                    <?= $rmh['beds']; ?>
                                </td>
                                <!-- <td>
                                    <= $rmh['jumlah_lantai'];>
                                </td> -->
                                <td>
                                    <?= $rmh['baths']; ?>
                                </td>
                                <td>
                                    <?= $rmh['garages']; ?>
                                </td>
                                <td>
                                    <?php if ($rmh['status'] == 0)
                                        echo "for sale";
                                    else
                                        echo "rent"; ?>
                                </td>
                                <td>
                                    <a href="<?= BASEURL; ?>/rumah/ubah/<?= $rmh['id_rumah']; ?>"
                                        class="badge text-bg-primary tampilModalUbah" data-bs-toggle="modal"
                                        data-bs-target="#formModal" data-id="<?= $rmh['id_rumah']; ?>">Edit</a>
                                    <a href="<?= BASEURL; ?>/rumah/hapus/<?= $rmh['id_rumah']; ?>"
                                        class="badge text-bg-danger" onclick="return confirm('Hapus data?')">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="pagination-a">
                            <ul class="pagination justify-content-end">
                                <li class="page-item <?= ($data['currentPage'] == 1) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= BASEURL; ?>/rumah/index/<?= $data['currentPage'] - 1; ?>"><span
                                            class="bi bi-chevron-left"></span></a>
                                </li>
                                <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                                    <?php if ($i == $data['currentPage']): ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="<?= BASEURL; ?>/rumah/index/<?= $i; ?>"><?= $i; ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/rumah/index/<?= $i; ?>"><?= $i; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <li
                                    class="page-item <?= ($data['currentPage'] == $data['totalPages']) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= BASEURL; ?>/rumah/index/<?= $data['currentPage'] + 1; ?>"><span
                                            class="bi bi-chevron-right"></span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Rumah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/rumah/tambah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_rumah" id="id_rumah">
                    <input type="hidden" name="id_akun" id="id_akun">
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <select class="form-select" name="tipe" id="tipe">
                            <option value="Classic">Classic</option>
                            <option value="Modern">Modern</option>
                            <option value="Minimalis">Minimalis</option>
                            <option value="Nature">Nature</option>
                            <option value="Futuristik">Futuristik</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="area" class="form-label">Area (m²)</label>
                            <input type="text" class="form-control" id="area" name="area" placeholder="Area" required>
                        </div>

                        <div class="col-6">
                            <label for="harga" class="form-label">Harga ($)</label>
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="beds" class="form-label">Beds</label>
                            <input type="text" class="form-control" id="beds" name="beds" placeholder="Beds" required>
                        </div>
                        <div class="col-4">
                            <label for="baths" class="form-label">Baths</label>
                            <input type="text" class="form-control" id="baths" name="baths" placeholder="Baths"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="garages" class="form-label">Garages</label>
                            <input type="text" class="form-control" id="garages" name="garages" placeholder="Garages"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="0">For Sale</option>
                            <option value="1">Rent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="hidden" id="backup" name="backup">
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-b-n">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script></script>