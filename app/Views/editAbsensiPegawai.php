<?= $this->extend("//template");?>

<?= $this->section("content");?>
<?= $this->include("//sidebar");?>

<div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Absensi</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/update_absensi" method="post">
                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode Karyawan</label>
                      <input name="kode_karyawan" value="<?= $karyawan[0]['kode_karyawan']; ?>" type="text" class="form-control" id="kode" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" value="<?= $karyawan[0]['nama']; ?>" type="text" class="form-control" id="nama_karyawan" readonly>
                    </div>
                    <div class="mb-3 col-3">
                      <label for="tgl" class="form-label">Tanggal Absen</label>
                      <input name="tanggal" value="<?= $karyawan[0]['tanggal']; ?>" type="date" class="form-control" id="tgl">
                    </div>

                    <?php if($karyawan[0]['status'] == 'HADIR') : ?>
                    <div class="mb-5">
                      <label for="status" class="form-label">Status</label>
                      <select name="status" type="text" class="form-control mr-3" id="karyawan" aria-describedby="emailHelp">
                        <option id="status" value="HADIR" selected>HADIR</option>
                        <option id="status" value="TIDAK MASUK">TIDAK MASUK</option>
                      </select>
                    </div>
                    <?php else: ?>
                      <div class="mb-5">
                      <label for="status" class="form-label">Status</label>
                      <select name="status" type="text" class="form-control mr-3" id="karyawan" aria-describedby="emailHelp">
                        <option id="status" value="HADIR">Masuk</option>
                        <option id="status" value="TIDAK MASUK" selected>TIDAK MASUK</option>
                      </select>
                    </div>
                    <?php endif;?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>