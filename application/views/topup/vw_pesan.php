<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Website top-up terbesar, tercepat dan terpercaya</h4>

                            </div>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message'); ?>

                    <div class="row">
                        <?php foreach ($valorant as $us) : ?>
                            <div class="col-lg-4 col-md-10 col-sm-10">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/img/valorant/') . $us['gambar']; ?>">
                                        <div class="ep"><?= $us['points']; ?> Points</div>
                                    </div>
                                    <div class="product__item__text">
                                        <div class="badge badge-secondary">
                                            <button type="button" class="btn btn-secondary">Rp. <?= $us['harga']; ?>
                                        </div>
                                        <div class="badge badge-secondary">
                                            <a href="<?= base_url('topup/pembelian/') . $us['id'] ?>"><button type="button" class="btn btn-dark">BUY</a>
                                        </div>
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