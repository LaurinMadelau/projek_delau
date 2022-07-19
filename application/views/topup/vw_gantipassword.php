<section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Masukkan Password</h3>
                        <form action="<?= base_url('topup/gantipassword')?>" method="POST">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="input__item">
                                <input type="password" name="current_password" id="current_password" placeholder="Current Password">
                                <span class="icon_lock"></span>
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password1" id="password1" value="<?= set_value('password'); ?>" placeholder="New Password">
                                <span class="icon_lock"></span>
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password2" id="password2" value="<?= set_value('password'); ?>" placeholder="Repeat Password">
                                <span class="icon_lock"></span>
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="site-btn">Change Password</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-10 col-sm-10">
                 <div class="product__item">
                     <div class="product__item__pic set-bg" data-setbg="<?=base_url('assets/')?>img/hero/valorant2.jpg">
                     </div>
            </div>
        </div>
    </section>