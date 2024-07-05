<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Penambahan Aset</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/input_aset" method="post">
                    <div class="mb-4">
                      <label for="exampleInputEmail1" class="form-label">Kode Aset</label>
                      <input value="<?php $a = (int)$aset[0]['kode_aset']; if($a == 0) :?> <?= 'AT-00'.$a; ?> <?php elseif($a < 10) :?> <?= 'AT-00'.$a; ?><?php elseif($a >= 10 && $a < 100) :?> <?= 'AT-0'.$a; ?><?php else :?> <?= 'AT-'.$a; ?><?php endif; ?>" name="kode_aset" type="text" class="form-control border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                    </div>
                    <div class="mb-4">
                      <label for="aset" class="form-label">Nama Barang</label>
                      <input name="aset" type="text" class="form-control" id="aset" required>
                    </div>
                    <div class="mb-4">
                      <label for="jenis" class="form-label">Jenis Aset</label>
                      <input name="jenis_aset" type="text" class="form-control" id="jenis" required>
                    </div>
                    <div class="mb-4">
                      <label for="jumlah" class="form-label">Jumlah</label>
                      <input name="jumlah" type="number" class="form-control" id="jumlah" required>
                    </div>
                    <div class="mb-5 col-3">
                      <label for="tanggal" class="form-label">Tanggal Pembelian</label>
                      <input name="tanggal" type="date" class="form-control" id="tanggal"required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>