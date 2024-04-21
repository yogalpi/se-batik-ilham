<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<form action="/simpanStatus" method="post">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Detail Invoice</h5>
        <div class="card">
          <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Transaksi</label>
                <input readonly name="kode_transaksi" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" value="<?= $detail_penjualan["kode_penjualan"] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal Transaksi</label>
                <input readonly name="tanggal_transaksi" type="text" class="form-control" id="exampleInputPassword1" value="<?= $detail_penjualan["tanggal"] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Pelanggan</label>
                <input readonly name="nama_pelanggan" type="text" class="form-control" id="exampleInputPassword1" value="<?= $detail_penjualan["username"] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Status</label>
                <select name="status" id="" class="form-control">
                  <option <?= ($detail_penjualan["status"] == "Dikirim" ? "selected" : "") ?> value="Dikirim">Dikirim</option>
                  <option <?= ($detail_penjualan["status"] == "Dikemas" ? "selected" : "") ?> value="Dikemas">Dikemas</option>
                  <option <?= ($detail_penjualan["status"] == "Dibatalkan" ? "selected" : "") ?> value="Dibatalkan">Dibatalkan</option>
                </select>
              </div>
              <div class="mb-3 col">
                <label for="exampleInputPassword1" class="form-label">Data Pembelian</label>
                <div>
                  <ul>
                    <?php foreach ($barang as $b): ?>
                    <li class="d-flex justify-content-between">
                      <div>- <?= $b["nama_pakaian"] ?></div>
                      <div><?= $b["qty"] ?></div>
                      <div><?= $b["harga"] ?></div>
                    </li>
                    <?php endforeach ?>
                    <li>
                      <hr>
                    </li>
                    <li class="d-flex justify-content-between">
                      <div>TOTAL</div>
                      <div><?= $detail_penjualan["total"] ?></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Metode Pembayaran</label>
                <input readonly name="nama_barang" type="text" class="form-control" id="exampleInputPassword1" value="<?= $detail_penjualan["metode_pembayaran"] ?>">
              </div>
              <div class="mb-5">
                <label for="exampleInputPassword1" class="form-label">Jenis Pengiriman</label>
                <input readonly name="nama_barang" type="text" class="form-control" id="exampleInputPassword1" value="<?= $detail_penjualan["jenis_pengiriman"] ?>">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="javascript:history.go(-1)" class="btn btn-dark">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?= $this->endSection(); ?>