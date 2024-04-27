<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Absensi</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/update_aset" method="post">
                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode Karyawan</label>
                      <input name="kode_karyawan" value="<?= $karyawan[0]['kode']; ?>" type="text" class="form-control" id="kode" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" value="<?= $karyawan[0]['nama']; ?>" type="text" class="form-control" id="nama_karyawan" readonly>
                    </div>
                    <div class="mb-5 col-3">
                      <label for="tanggal" class="form-label">Tanggal Absen</label>
                      <input name="tanggal" value="value="<?= $karyawan[0]['tanggal']; ?> type="date" class="form-control" id="tanggal">
                    </div>
                    <div class="mb-3">
                      <label for="status" class="form-label">Status</label>
                      <input name="status" value="<?= $karyawan[0]['status']; ?>" type="number" class="form-control" id="status">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>