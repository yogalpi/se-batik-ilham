<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Input Gaji Karyawan Umum</h5>
              <div class="card">
                <div class="card-body">
                  <form action="input_gaji_umum" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Gaji</label>
                      <input name="kode_gaji" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Karyawan</label>
                      <input name="kode_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah Presensi</label>
                      <input name="jumlah_absensi" onkeyup="(function(data, v){
                        document.getElementById('total_gaji').value = v.value*data
                      })(<?= $gaji[1]['gaji']; ?>, this)" type="number" class="form-control" id="jumlah">
                    </div>
                    <div class="mb-5">
                      <label for="total_gaji" class="form-label">Total Gaji</label>
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