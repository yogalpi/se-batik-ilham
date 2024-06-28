<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Detail Kebutuhan Produksi</h5>
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Satuan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_produksi as $dep): ?>
                                <tr>
                                    <td scope="row"><?= $dep["nama_barang"] ?></td>
                                    <td scope="row"><?= $dep["jumlah_barang"] ?></td>
                                    <td scope="row"><?= $dep["satuan"] ?></td>
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