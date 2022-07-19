<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>HALAMAN ADMIN</h4>

                            </div>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="btn__all">
                        <a href="<?= base_url() ?>Valorant/tambah" class="primary-btn">Tambah Data Valorant <span class="arrow_right"></span></a>
                    </div>

                    <div class="row">
                        <?php foreach ($valorant as $us) : ?>
                            <div class="col-lg-6 col-md-10 col-sm-10">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/img/valorant/') . $us['gambar']; ?>">
                                        <div class="ep"><?= $us['points']; ?> Points</div>
                                    </div>
                                    <div class="product__item__text">
                                        <div class="badge badge-secondary">
                                            <button type="button" class="btn btn-dark">Rp. <?= $us['harga']; ?>
                                        </div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li class="active">
                                                <h5><a href="<?= base_url('Valorant/edit/') . $us['id']; ?>">Edit</a></h5>
                                            </li>
                                            <li class="active">
                                                <h5><a href="<?= base_url('Valorant/hapus/') . $us['id']; ?>">Hapus</a></h5>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>