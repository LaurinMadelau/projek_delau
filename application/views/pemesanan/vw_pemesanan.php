<br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 ">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacinf="0">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nickname</td>
                                    <td>Pembayaran</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pemesanan as $us) : ?>
                                    <tr>
                                        <td> <?= $i; ?>.</td>
                                        <td><?= $us['nickname']; ?></td>
                                        <td><?= $us['pembayaran']; ?></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure to proceed?');" href="<?= base_url('pemesanan/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>