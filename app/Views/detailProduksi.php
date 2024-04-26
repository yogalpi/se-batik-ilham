<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Detail Produksi</h5>
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                                <th scope="col">Jenis Baju</th>
                                <th scope="col">Ukuran</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_produksi as $dep): ?>
                                <tr>
                                    <td scope="row"><?= $dep["jenis_baju"] ?></td>
                                    <td scope="row"><?= $dep["ukuran"] ?></td>
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