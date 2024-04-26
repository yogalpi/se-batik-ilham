<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Absensi Karyawan Umum</h5>
              <div class="card">
                <div class="card-body">
                <?php if(session()->getFlashdata('sukses')):?>
                    <div onclick="(function(notif){
                      notif.style.display = 'none';
                      })(this)" id="notif" class="alert alert-success" role="alert">
                      <?= session()->getFlashdata('sukses')?>
                    </div>
                  <?php endif; ?>
                  <form action="input_absensi" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">ID Karyawan</label>
                      <select name="kode_karyawan" type="text" class="form-control" id="karyawan" aria-describedby="emailHelp">
                        <option selected>-- Pilih Karyawan --</option>
                        <?php foreach($data as $g) : ?>
                          <option id="id_karyawan" value="<?= $g['kode']?>"><?= $g['kode']?> - - <?= $g['nama']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input name="tanggal" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5">
                      <label for="total_gaji" class="form-label">Status</label>
                        <div class="form-check m-3">
                            <input name="status" type="radio" class="form-check-input" id="hadir" value="hadir"><label class="form-check-label" for="hadir">Hadir</label>
                        </div>
                        <div class="form-check m-3">
                            <input name="status" type="radio" class="form-check-input" id="tidakMasuk" value="tidak masuk"><label class="form-check-label" for="tidakMasuk">Tidak Masuk</label>
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