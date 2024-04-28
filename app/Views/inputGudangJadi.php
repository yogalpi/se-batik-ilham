<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Form Data Input Gudang Jadi</h5>
      <div class="card">
        <div class="card-body">
          <form action="/simpan_gudang_jadi" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
              <input name="kode_barang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Kode Produksi</label>
              <select name="kode_produksi" id="" class="form-control">
                <option selected disabled>Silahkan Pilih Dari Produksi apa</option>
              <?php foreach ($produksi as $prod) : ?>
                <option value="<?= $prod["kode_produksi"]?>">[ <?= $prod["tanggal_mulai"]?> : <?= $prod["tanggal_selesai"]?> ] <?= $prod["kode_produksi"]?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
              <input name="nama_barang" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Ukuran</label>
              <input name="ukuran" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Jumlah</label>
              <input name="jumlah" type="number" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-5">
              <label for="exampleInputPassword1" class="form-label">Harga</label>
              <input name="harga" type="number" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>