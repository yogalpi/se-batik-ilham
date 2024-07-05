<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Aset</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/update_aset" method="post">
                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode Aset</label>
                      <input name="kode_aset" value="<?= $aset[0]['kode_aset']; ?>" type="text" class="form-control" id="kode" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="aset" class="form-label">Nama Barang</label>
                      <input name="aset" value="<?= $aset[0]['nama_aset']; ?>" type="text" class="form-control" id="aset" required>
                    </div>
                    <div class="mb-3">
                      <label for="jenis_aset" class="form-label">Jenis Aset</label>
                      <input name="jenis_aset" value="<?= $aset[0]['jenis_aset']; ?>" type="text" class="form-control" id="jenis_aset" required>
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah</label>
                      <input name="jumlah" value="<?= $aset[0]['jumlah']; ?>" type="number" class="form-control" id="jumlah" required>
                    </div>
                    <div class="mb-5 col-3">
                      <label for="tanggal" class="form-label">Tanggal Pembelian</label>
                      <input name="tanggal" value="value="<?= $aset[0]['tanggal']; ?> type="date" class="form-control" id="tanggal" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>