 <section class="signup spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="login__form">
                     <h3>TOP UP Valorant</h3>
                     <form action="" method="POST">
                     <input type="hidden" name="id" value="<?= $valorant['id']; ?>">
                         <div class="input__item">
                             <input type="text" name="nickname" id="nickname" value="<?= set_value('nickname'); ?>" placeholder="Masukkan NickName">
                             <span class="icon_profile"></span>
                             <?= form_error('nickname', '<small class="text-danger pl-3">', '</small>'); ?>
                         </div>
                         <div class="input__item">
                             <input type="text" name="pembayaran" id="pembayaran" value="<?= set_value('pembayaran'); ?>" placeholder="Masukkan Metode Pembayaran">
                             <span class="icon_cart"></span>
                             <?= form_error('pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                         </div>
                         <button type="submit" class="site-btn">BUY NOW</button>
                     </form>
                 </div>
             </div>
             <div class="col-lg-5 col-md-10 col-sm-10">
                 <div class="product__item">
                     <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/img/valorant/') . $valorant['gambar']; ?>">
                         <div class="ep"><?= $valorant['points']; ?> Points</div>
                     </div>
                     <div class="product__item__text">
                         <div class="badge badge-secondary">
                             <button type="button" class="btn btn-dark">Rp. <?= $valorant['harga']; ?>
                         </div>
                     </div>
                 </div>
             </div>
 </section>
 