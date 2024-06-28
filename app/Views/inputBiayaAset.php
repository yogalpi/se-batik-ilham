<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Pemeliharaan Aset</h5>
              <div class="card">
                <div class="card-body">
                  <?php if(session()->getFlashdata('sukses')):?>
                    <div onclick="(function(notif){
                    notif.style.display = 'none';
                    })(this)" id="notif" class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('sukses')?>
                    </div>
                  <?php endif; ?>
                  <form action="/input_biaya_aset" method="post">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">ID Aset</label>
                      <select name="kode_aset" type="text" class="form-control" id="karyawan" aria-describedby="emailHelp">
                        <option selected>-- Pilih Aset --</option>
                        <?php foreach($aset as $a) : ?>
                          <option value="<?= $a['kode_aset']?>"><?= $a['kode_aset']?> - - <?= $a['nama_aset']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="biaya" class="form-label">Biaya Pemeliharaan</label>
                      <input name="biaya" type="text" class="form-control" id="biaya">
                    </div>
                    <div class="mb-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <div>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="mb-5 col-3">
                      <label for="tanggal"  class="form-label">Tanggal Pemeliharaan</label>
                      <input name="tanggal" type="date" id="tanggal" class="form-control" id="tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajukan Permintaan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>