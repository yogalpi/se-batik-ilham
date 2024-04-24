<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Data detail transaksi</h5>
      <p class="card-title mb-4">NOTA TRANSAKSI : <?= $detail_transaksi[0]["kode_penjualan"]?></p>
      <div class="card">
        <div class="card-body">

          <table class="table table-hover mb-5">
            <thead>
              <tr>
                <th scope="col">NAMA PRODUK</th>
                <th scope="col">UKURAN</th>
                <th scope="col">JUMLAH BELI</th>
                <th scope="col">HARGA</th>
                <th scope="col">SUB-TOTAL</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($detail_transaksi as $dt) : ?>
                <tr>
                  <th scope="row"><?= $dt["nama_pakaian"]?></th>
                  <td><?= $dt["ukuran"]?></td>
                  <td><?= $dt["qty"]?></td>
                  <td><?= $dt["harga"]?></td>
                  <td><?= $dt["harga"]*$dt["qty"] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <a href="javascript:history.go(-1)" class="btn btn-dark">Kembali</a>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>