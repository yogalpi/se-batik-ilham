<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Input Gaji Karyawan Umum</h5>
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Karyawan</label>
                      <input name="kode_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Karyawan</label>
                      <input name="namaKaryawan" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jumlah Presensi</label>
                      <input name="jumlahPresensi" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputPassword1" class="form-label">Total Gaji</label>
                      <input name="totalGaji" type="number" class="form-control" readonly id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>