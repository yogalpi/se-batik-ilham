<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Detail Produk "<?= $detail_gudang_jadi[0]['nama_pakaian']?>"</h5>
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_gudang_jadi as $dgj): ?>
                                <tr>
                                    <td scope="row"><?= $dgj["ukuran"] ?></td>
                                    <td scope="row"><?= $dgj["jumlah"] ?></td>
                                    <td scope="row"><?= $dgj["harga"] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>