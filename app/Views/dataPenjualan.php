<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <form action="<?= site_url("/laporan_kasir/export") ?>" method="post">
                    <div class="col-4">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <div class="d-flex gap-2">
                            <input type="date" id="tanggal" class="form-control" name="tanggal">
                            <button type="submit" class="btn btn-primary">Download</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kode penjualan</th>
                                <th scope="col">Nama pakaian</th>
                                <th scope="col">Terjual</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kode pelanggan</th>
                                <th scope="col">Jenis pengiriman</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penjualan as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $p['tanggal'] ?></th>
                                    <td><?= $p['kode_penjualan'] ?></td>
                                    <td><?= $p['nama_pakaian'] ?></td>
                                    <td><?= $p['qty'] ?></td>
                                    <td><?= $p['harga'] ?></td>
                                    <td><?= $p['kode_pelanggan'] ?></td>
                                    <td><?= $p['jenis_pengiriman'] ?></td>
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