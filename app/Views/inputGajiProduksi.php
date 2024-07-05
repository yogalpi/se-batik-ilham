<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Input Gaji Karyawan Produksi</h5>
              <div class="card">
                <div class="card-body">
                <?php if(session()->getFlashdata('salah')):?>
                      <div onclick="(function(notif){
                        notif.style.display = 'none';
                        })(this)" id="notif" class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('salah')?>
                      </div>
                <?php endif;?>
                  <form action="input_gaji_produksi" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail0" class="form-label">Kode Penggajian</label>
                      <input name="kode_gaji" type="text" class="form-control" id="kode_gaji" aria-describedby="emailHelp" readonly>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">ID Karyawan</label>
                      <select name="kode_karyawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <option value="0" selected>-- Pilih Karyawan --</option>
                        <?php if($gaji != null):?>
                          <?php foreach($gaji as $g) : ?>
                            <option value="<?= $g['kode']?>"><?= $g['kode']?> - - <?= $g['nama']?></option>
                          <?php endforeach; ?>
                        <?php endif;?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail2" class="form-label">Kode Produksi</label>
                      <select onchange="(function(k){
                        <?php $kode = null; ?>
                        <?php if(empty($kode_gaji['kode_gaji'])) : ?>
                          $kode = 0;
                        <?php else :?>
                          <?php $kode = $kode_gaji['kode_gaji'];?>
                        <?php endif; ?>
                        <?php if($kode+1 < 10) : ?>
                          $nol = '00'
                        <?php elseif($kode+1 >= 10 && $kode+1 < 100) : ?>
                          $nol = '0'
                        <?php else : ?>
                          $nol = ''
                        <?php endif; ?>
                        document.getElementById('kode_gaji').value = 'G-'+k.value.slice(4, 7)+'-'+$nol+'<?= $kode+1; ?>'
                      })(this)" name="kode_produksi" type="text" class="form-control" id="kode_produksi" aria-describedby="emailHelp">
                        <option value="0" selected>-- Pilih Kode Produksi --</option>
                        <?php foreach($produksi as $p) : ?>
                          <option value="<?= $p['kode_produksi']?>"><?= $p['kode_produksi']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jumlah Produksi</label>
                      <input name="jumlah_produksi" <?php if($gaji != null): ?>onkeyup="(function(data, v){
                        document.getElementById('total_gaji').value = v.value*data
                      })(<?= $gaji[0]['gaji']; ?>, this)"<?php endif;?> type="number" class="form-control" id="jumlah">
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