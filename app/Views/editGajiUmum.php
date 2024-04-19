<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Gaji Karyawan Umum</h5>
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post">
                    <div class="mb-3">
                      <label for="kode_karyawan" class="form-label">Kode Karyawan</label>
                      <input name="kode_karyawan" type="text" class="form-control" id="kode_karyawan" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" type="text" class="form-control" id="nama_karyawan">
                    </div>
                    <div class="mb-3">
                      <label for="jumlah_presensi" class="form-label">Jumlah Presensi</label>
                      <input name="jumlah_presensi" type="text" class="form-control" id="jumlah_presensi">
                    </div>
                    <div class="mb-5">
                      <label for="totsl_gaji" class="form-label">Total Gaji</label>
                      <input name="total_gaji" type="number" class="form-control" readonly id="total_gaji">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>