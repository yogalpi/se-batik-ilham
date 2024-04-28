<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Gaji Karyawan Produksi</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/update_gaji_produksi" method="post">
                    <div class="mb-3">
                      <label for="kode_gaji" class="form-label">Kode Penggajian</label>
                      <input name="kode_gaji" value="<?= $gaji[0]['kode_gaji']; ?>" type="text" class="form-control" id="kode_gaji" aria-describedby="emailHelp" readonly>
                    </div>
                    
                    <div class="mb-3">
                      <label for="kode_karyawan" class="form-label">ID Karyawan</label>
                      <input name="kode_karyawan" value="<?= $gaji[0]['kode']; ?>" type="text" class="form-control" id="kode_karyawan" aria-describedby="emailHelp" readonly>
                    </div>
                    
                    <div class="mb-3">
                      <label for="kode_produksi" class="form-label">Kode Produksi</label>
                      <input name="kode_produksi" value="<?= $gaji[0]['kode_produksi']; ?>" type="text" class="form-control" id="kode_produksi" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah Produksi</label>
                      <input name="jumlah_produksi" value="<?= $gaji[0]['jumlah_produksi']; ?>" type="number" class="form-control" id="jumlah">
                    </div>
                    <div class="mb-5">
                      <label for="total_gaji" class="form-label">Total Gaji</label>
                      <input name="total_gaji" value="<?= $gaji[0]['total_gaji']; ?>" type="number" class="form-control" id="total_gaji">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>