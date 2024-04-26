<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Input Gaji Karyawan Produksi</h5>
              <div class="card">
                <div class="card-body">
                  <form action="input_gaji_produksi" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail0" class="form-label">Kode Penggajian</label>
                      <input name="kode_gaji" type="text" class="form-control" id="kode_gaji" aria-describedby="emailHelp" readonly>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">ID Karyawan</label>
                      <select name="kode_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <option selected>-- Pilih Karyawan --</option>
                        <?php foreach($gaji as $g) : ?>
                          <option value="<?= $g['kode']?>"><?= $g['kode']?> - - <?= $g['nama']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <!-- <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Karyawan</label>
                      <input name="kode_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div> -->
                    <div class="mb-3">
                      <label for="exampleInputEmail2" class="form-label">Kode Produksi</label>
                      <!-- <input name="kode_produksi" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"> -->
                      <select onchange="(function(k){
                        <?php $kode = null; ?>
                        <?php if(empty($kode_gaji['kode_gaji'])) :?>
                          $kode = 0;
                        <?php else :?>
                          <?php $kode = $kode_gaji['kode_gaji'];?>
                        <?php endif; ?>
                        document.getElementById('kode_gaji').value = 'G-'+k.value.slice(2, 5)+'-'+'00<?= $kode+1; ?>'
                      })(this)" name="kode_produksi" type="text" class="form-control" id="kode_produksi" aria-describedby="emailHelp">
                        <option selected>-- Pilih Kode Produksi --</option>
                        <?php foreach($produksi as $p) : ?>
                          <option value="<?= $p['kode_produksi']?>"><?= $p['kode_produksi']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <!-- <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Karyawan</label>
                      <input name="nama_karyawan" type="text" class="form-control" id="exampleInputPassword1">
                    </div> -->
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jumlah Produksi</label>
                      <input name="jumlah_produksi" onkeyup="(function(data, v){
                        document.getElementById('total_gaji').value = v.value*data
                      })(<?= $gaji[0]['gaji']; ?>, this)" type="number" class="form-control" id="jumlah">
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputPassword1" class="form-label">Total Gaji</label>
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