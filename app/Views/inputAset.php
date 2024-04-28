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
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Aset</label>
                      <input value="<?php $aset = (int)$aset[0]['kode_aset']; if($aset == 0) :?> <?= 'AT-00'.$aset+1; ?> <?php elseif($aset < 10) :?> <?= 'AT-00'.$aset; ?><?php elseif($aset >= 10 && $aset < 100) :?> <?= 'AT-0'.$aset; ?><?php else :?> <?= 'AT-'.$aset; ?><?php endif; ?>" name="kode_aset" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="aset" class="form-label">Nama Barang</label>
                      <input name="aset" type="text" class="form-control" id="aset">
                    </div>
                    <div class="mb-3">
                      <label for="jenis" class="form-label">Jenis Aset</label>
                      <input name="jenis_aset" type="text" class="form-control" id="jenis">
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah</label>
                      <input name="jumlah" type="number" class="form-control" id="jumlah">
                    </div>
                    <div class="mb-5 col-3">
                      <label for="tanggal" class="form-label">Tanggal Pembelian</label>
                      <input name="tanggal" type="date" class="form-control" id="tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>