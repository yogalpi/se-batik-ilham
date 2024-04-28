<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Karyawan</h5>
              <div class="card">
                <div class="card-body">

                  <form action="/update_pegawai" method="post">
                    <div class="mb-3">
                      <label for="kode_karyawan" class="form-label">Kode Karyawan</label>
                      <input name="kode_karyawan" value="<?= $data[0]['kode']; ?>" type="text" class="form-control" id="kode_karyawan" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" value="<?= $data[0]['nama']; ?>" type="text" class="form-control" id="nama_karyawan">
                    </div>

                    <?php if($data[0]['jenis_kelamin'] == 'Laki-laki') : ?>
                      <div class="row mb-3">
                      <label for="" class="form-label">Jenis Kelamin</label>
                    <div class="form-check m-3">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="laki-laki" value="Laki-laki" checked><label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check m-3">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="perempuan" value="Perempuan"><label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    </div>
                    <?php else: ?>
                      <div class="row mb-3">
                      <label for="" class="form-label">Jenis Kelamin</label>
                    <div class="form-check m-3">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="laki-laki" value="Laki-laki"><label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check m-3">
                        <input name="jenis_kelamin" type="radio" class="form-check-input" id="perempuan" value="Perempuan" checked><label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    </div>
                    <?php endif; ?>

                    <div class="mb-3 col-3">
                      <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                      <input name="tanggal_lahir" value="<?= $data[0]['tanggal']; ?>" type="date" class="form-control" id="tanggallahir">
                    </div>

                    <?php if($data[0]['kode_jenis'] == 'KP') : ?>
                    <div class="row mb-5">
                      <label class="form-label">Jenis Karyawan</label>
                    <div class="form-check m-3">
                        <input name="jenis_karyawan" type="radio" class="form-check-input" id="KP" value="KP" checked><label class="form-check-label" for="KP">Karyawan Produksi</label>
                    </div>
                    <div class="form-check m-3">
                        <input name="jenis_karyawan" type="radio" class="form-check-input" id="KU" value="KU"><label class="form-check-label" for="KU">Karyawan Umum</label>
                    </div>
                    </div>
                    <?php else: ?>
                    <div class="row mb-5">
                      <label class="form-label">Jenis Karyawan</label>
                    <div class="form-check m-3">
                        <input name="jenis_karyawan" type="radio" class="form-check-input" id="KP" value="KP"><label class="form-check-label" for="KP">Karyawan Produksi</label>
                    </div>
                    <div class="form-check m-3">
                        <input name="jenis_karyawan" type="radio" class="form-check-input" id="KU" value="KU" checked><label class="form-check-label" for="KU">Karyawan Umum</label>
                    </div>
                    </div>
                    <?php endif; ?>
                    <?php if($data[0]['status'] == 'aktif') : ?>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select name="status" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <option value="<?= $data[0]['status'] ?>" selected>Aktif</option>
                            <option value="nonaktif">Non-Aktif</option>
                        </select>
                      </div>
                    <?php else: ?>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select name="status" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <option value="aktif">Aktif</option>
                            <option value="<?= $data[0]['status'] ?>" selected>Non-Aktif</option>
                        </select>
                      </div>
                    <?php endif; ?>
                    <div class="mb-5 col">
                      <label for="keterangan" class="form-label">Alamat</label>
                      <div>
                        <textarea name="alamat" id="keterangan" class="form-control" rows="4"><?= $data[0]['alamat']; ?></textarea>
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