<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Detail Pengadaan</h5>
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                                <th scope="col">BARANG KEBUTUHAN</th>
                                <th scope="col">ESTIMASI PENGELUARAN</th>
                                <th scope="col">SUPPLIER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_pengadaan as $dp): ?>
                                <tr>
                                    <td scope="row"><?= $dp["kebutuhan"] ?></td>
                                    <td scope="row"><?= $dp["biaya"] ?></td>
                                    <td scope="row"><?= $dp["kode_supplier"] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <!-- <a href="/manajemen_aset"><button type="submit" class="btn btn-primary">+ Tambah Manajemen Asset</button></a> -->

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>