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
                                    <td>Jumlah Valorant Point</td>
                                    <td>Nickname</td>
                                    <td>Harga</td>
                                    <td>Pembayaran</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($topup as $us) : ?>
                                    <tr>
                                        <td> <?= $i; ?>.</td>
                                        <td><?= $us['points']; ?></td>
                                        <td><?= $us['nickname']; ?></td>
                                        <td><?= $us['harga']; ?></td>
                                        <td><?= $us['pembayaran']; ?></td>
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