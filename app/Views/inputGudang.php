<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Data Bahan Baku</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/input_gudang" method="post">
                    <div class="col-4">
                      <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
                      <input value="<?php $gb = (int)$gudangBahan[0]['kode_barang']; if($gb == 0) :?> <?= 'BB-00'.$gb; ?> <?php elseif($gb < 10) :?> <?= 'BB-00'.$gb; ?><?php elseif($gb >= 10 && $gb < 100) :?> <?= 'BB-0'.$gb ?><?php else :?> <?= 'BB-'.$gb; ?><?php endif; ?>" name="kode_barang" type="text" class="form-control border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                    </div>
                    
                    <div class="col-4">
                      <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
                      <input name="nama_barang" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-4">
                      <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                      <input name="jumlah" type="number" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-4">
                      <label for="exampleInputPassword1" class="form-label">Satuan</label>
                      <select name="satuan" id="satuan" class="form-control">
                        <option value="Meter">Meter</option>
                        <option value="PCS">PCS</option>
                        <option value="Bungkus">Bungkus</option>
                        </select>
                    </div>
                    <div class="mb-5 ">
                      <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                      <div>
                        <textarea name="keterangan" id="" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="mb-5 col-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input name="tanggal" type="date" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>