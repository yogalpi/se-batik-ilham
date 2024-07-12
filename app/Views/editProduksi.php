<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Rencana Produksi</h5>
      <div class="card">
        <div class="card-body">
          <form action="/updateProduksi" method="post">
            <div class="mb-3">
              <label for="kode_produksi" class="form-label">Kode Produksi</label>
              <input name="kode_produksi" type="text" value="<?= $produksi[0]["kode_produksi"] ?>" class="form-control"
                id="kode_produksi" readonly aria-describedby="emailHelp">
            </div>

            <div class="col-4">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input name="tanggal_mulai" type="date" value="<?= $produksi[0]["tanggal_mulai"] ?>" class="form-control"
                id="tanggal_mulai">
            </div>
            <div class="col-4">
              <label for="tanggal_mulai" class="form-label">Tanggal Selesai</label>
              <input name="tanggal_selesai" type="date" value="<?= $produksi[0]["tanggal_selesai"] ?>"
                class="form-control" id="tanggal_mulai">
            </div>

            <div class="mb-3 col">
              <label for="rencana_produksi" class="form-label">Rencana Produksi</label>
              <div>
                <textarea name="rencana_produksi" id="rencana_produksi" class="form-control"
                  rows="4"><?= $produksi[0]["rencana_produksi"] ?></textarea>
              </div>
            </div>

            <div class="mb-3 row">

              <?php foreach ($produksi as $prod): ?>
                <input name="id[]" type="hidden" value="<?= $prod["id"] ?>" class="form-control" id="kode_produksi"
                  readonly aria-describedby="emailHelp">
                <div class="col-4">
                  <label for="detail_pengadaan" class="col-sm-12 col-form-label">Kode Barang</label>
                  <input type="text" value="<?= $prod["kode_barang"] ?>" class="form-control col-6"  id="detail_produksi"
                    name="kode_barang[]" readonly>
                </div>
                <div class="col-4">
                  <label for="detail_produksi" class="col-sm-12 col-form-label">Jumlah Barang</label>
                  <input type="number" value="<?= $prod["jumlah_barang"] ?>" class="form-control col-6"  id="detail_produksi"
                    name="jumlah_barang[]" readonly>
                </div>
                <div class="col-4">
                  <label for="detail_produksi" class="col-sm-12 col-form-label">Satuan</label>
                  <input type="text" value="<?= $prod["satuan"] ?>" class="form-control col-6"  id="detail_produksi"
                    name="satuan[]" readonly>
                </div>

              <?php endforeach ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?= $this->endSection(); ?>