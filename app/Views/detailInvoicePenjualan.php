<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<form action="" method="post">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Detail Invoice</h5>
        <div class="card">
          <div class="card-body">
            <form action="#" method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Transaksi</label>
                <input readonly name="kode_barang" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal Transaksi</label>
                <input readonly name="kode_produksi" type="text" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Pelanggan</label>
                <input readonly name="nama_barang" type="text" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                <textarea readonly name="alamat" id="" class="form-control" rows="4"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Status</label>
                <select name="status" id="" class="form-control">
                  <option value="dikirim">Dikirim</option>
                  <option value="dikemas">Dikemas</option>
                  <option value="dibatalkan">Dibatalkan</option>
                </select>
              </div>
              <div class="mb-3 col">
                <label for="exampleInputPassword1" class="form-label">Data Pembelian</label>
                <div>
                  <ul>
                    <li class="d-flex justify-content-between">
                      <div>- Kemeja Batik</div>
                      <div>2</div>
                      <div>600.000</div>
                    </li>
                    <li class="d-flex justify-content-between">
                      <div>- Kemeja Batik</div>
                      <div>2</div>
                      <div>700.000</div>
                    </li>
                    <li class="d-flex justify-content-between">
                      <div>- Kemeja Batik</div>
                      <div>2</div>
                      <div>400.000</div>
                    </li>
                    <li>
                      <hr>
                    </li>
                    <li class="d-flex justify-content-between">
                      <div>TOTAL</div>
                      <div>1.700.000</div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Metode Pembayaran</label>
                <input readonly name="nama_barang" type="text" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-5">
                <label for="exampleInputPassword1" class="form-label">Jenis Pengiriman</label>
                <input readonly name="nama_barang" type="text" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="javascript:history.go(-1)" class="btn btn-dark">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?= $this->endSection(); ?>