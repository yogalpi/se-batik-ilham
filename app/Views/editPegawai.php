<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Karyawan</h5>
              <div class="card">
                <div class="card-body">

                  <form action="#" method="post">
                    <div class="mb-3">
                      <label for="kode_karyawan" class="form-label">Kode karyawan</label>
                      <input name="kode_karyawan" type="text" class="form-control" id="kode_karyawan" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" type="text" class="form-control" id="nama_karyawan">
                    </div>
                    <div class="row mb-3">
                      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <div class="form-check m-2">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="laki-laki" value="Laki-Laki"><label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <div class="form-check m-2">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="perempuan" value="Perempuan"><label class="form-check-label" for="laki-laki">Laki laki</label>
                    </div>
                    </div>
                    <div class="mb-3">
                      <label for="nomorhp" class="form-label">Nomor HP</label>
                      <input name="nomorHp" type="number" class="form-control" id="nomorhp">
                    </div>
                    <div class="mb-5">
                      <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                      <input name="tanggalLahir" type="date" class="form-control" id="tanggallahir">
                    </div>
                    <div class="mb-5 col">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <div>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>