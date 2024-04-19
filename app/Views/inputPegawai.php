<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Penambahan Karyawan</h5>
              <div class="card">
                <div class="card-body">

                  <form action="/input_pegawai" method="post">
                    <div class="mb-3">
                      <label for="kode_karyawan" class="form-label">Kode karyawan</label>
                      <input name="kode_karyawan" type="text" class="form-control" id="kode_karyawan" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" type="text" class="form-control" id="nama_karyawan">
                    </div>

                    <div class="row mb-3">
                      <label for="" class="form-label">Jenis Kelamin</label>
                    <div class="form-check m-3">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="laki-laki" value="Laki-Laki"><label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check m-3">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="perempuan" value="Perempuan"><label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    </div>

                    <div class="mb-3">
                      <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                      <input name="tanggal_lahir" type="date" class="form-control" id="tanggallahir">
                    </div>

                    <div class="row mb-5">
                      <label class="form-label">Jenis Karyawan</label>
                    <div class="form-check m-3">
                        <input name="jenis_karyawan" type="radio" class="form-check-input" id="KP" value="KP"><label class="form-check-label" for="KP">Karyawan Produksi</label>
                    </div>
                    <div class="form-check m-3">
                        <input name="jenis_karyawan" type="radio" class="form-check-input" id="KU" value="KU"><label class="form-check-label" for="KU">Karyawan Umum</label>
                    </div>
                    </div>

                    <div class="mb-5 col">
                      <label for="keterangan" class="form-label">Alamat</label>
                      <div>
                        <textarea name="alamat" id="keterangan" class="form-control" rows="4"></textarea>
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