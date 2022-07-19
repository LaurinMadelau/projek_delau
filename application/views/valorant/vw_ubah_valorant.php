

<br>
<br>
<br>
<br>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $valorant['id'];?>">
                        <div class="form-group">
                            <label for="nama">Jumlah Points</label>
                            <input type="text" name="points" value="<?= $valorant['points'];?>" class="form-control" id="points" placeholder="Masukkan Jumlah Points">
                            <?= form_error('points', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" value="<?= $valorant['harga'];?>" class="form-control" id="harga" placeholder="Masukkan Harga">
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                        <img src="<?= base_url('assets/img/valorant/') . $valorant['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                            <label for="gambar">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                <label for="gambar" class="custom-file-label">Choose File</label>
                                <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <a href="<?= base_url('Valorant') ?>" class="btn btn-secondary">Tutup</a>
                        <button type="submit" name="ubah" class="btn btn-secondary float-right">Ubah Data Valorant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>