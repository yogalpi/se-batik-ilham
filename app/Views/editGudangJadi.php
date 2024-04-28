<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Form Data Edit Gudang Jadi</h5>
      <div class="card">
        <div class="card-body">
          <form action="/update_gudang_jadi" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
              <input name="kode_barang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $detail_gudang_jadi[0]["kode"] ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Kode Produksi</label>
              <select name="kode_produksi" id="" class="form-control">
                <option selected disabled>Silahkan Pilih Dari Produksi apa</option>
                <?php foreach ($produksi as $prod) : ?>
                  <option <?= ($prod["kode_produksi"] == $detail_gudang_jadi[0]["kode_produksi"]) ? 'selected' : '' ?> value="<?= $prod["kode_produksi"] ?>">[ <?= $prod["tanggal_mulai"] ?> ] <?= $prod["kode_produksi"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
              <input name="nama_barang" type="text" class="form-control" id="exampleInputPassword1" value="<?= $detail_gudang_jadi[0]["nama_pakaian"] ?>">
            </div>
            <table class="table" id="mytable">
              <thead>
                <tr>
                  <th scope="col">Ukuran</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($detail_gudang_jadi as $dgj) :?>
                  <tr>
                    <td>
                      <input name="ukuran[]" type="text" class="form-control" id="exampleInputPassword1" value="<?= $dgj["ukuran"] ?>">
                    </td>
                    <td>
                      <input name="jumlah[]" type="number" class="form-control" id="exampleInputPassword1" value="<?= $dgj["jumlah"] ?>">
                    </td>
                    <td>
                      <input name="harga[]" type="number" class="form-control" id="exampleInputPassword1" value="<?= $dgj["harga"] ?>">
                    </td>
                    <td>
                      <a href="/item_gudang_jadi/<?= $dgj["kode"] ?>/delete/<?= $dgj["ukuran"] ?>" class="btn btn-danger form-control" onclick="return confirm('Ingin menghapus data ini?')">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="d-flex justify-content-center mb-5">
              <span class="rounded-circle" onclick="addRow()">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                </svg>
              </span>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>