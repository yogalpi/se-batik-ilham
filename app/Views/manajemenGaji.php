<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Pengelolaan Gaji Karyawan</h5>
              <div class="card">
                <div class="card-body">
                <?php if(session()->getFlashdata('edit')):?>
                    <div onclick="(function(notif){
                      notif.style.display = 'none';
                      })(this)" id="notif" class="alert alert-primary" role="alert">
                      <?= session()->getFlashdata('edit')?>
                    </div>
                <?php endif; ?>
                <form action="input_gaji" method="post">  

                    <div class="table-responsive mb-5">
                      <table class="table">
                        <tr align="center">
                          <th>KODE JENIS GAJI</th>
                          <th>NILAI GAJI</th>
                          <th>HITUNGAN</th>
                          <th>AKSI</th>
                        </tr>

                        <?php foreach($gaji as $g) : ?>
                          <tr>
                            <td>
                              <div class="m-1">
                                  <input name="kode_jenis[]" readonly value="<?= $g['kode_jenis']?>" type="text" class="form-control" id="kode">
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                <input name="gaji[]" type="text"  value="<?= $g['gaji']?>" class="form-control border-secondary" id="nama">
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                <input type="text" readonly value="<?php if($g['kode_jenis'] == 'KP'): ?><?= 'Produksi'?><?php else: ?><?= 'Kehadiran'?><?php endif;?>" class="form-control" id="nama">
                              </div>
                            </td>
                            <td style="display: flex; justify-content: center;">
                              <div class="m-1">
                                <button id="button" type="submit" class="btn btn-warning ms-2">Update</button>
                              </div>
                            </td>
                          </tr>

                          <?php endforeach; ?>

                        </table>
                      </div>
                        <!-- <button id="button" type="submit" class="btn btn-warning ms-2">Update Nilai Gaji</button> -->
                    </form>

                    <div class="card-body d-flex w-full justify-content-center">
                      <a class="m-3" href="/gaji_produksi">
                          <button type="submit" class="btn btn-primary">Kelola Data Gaji Karyawan Produksi</button>
                      </a>
                      <a class="m-3" href="/gaji_umum">
                          <button type="submit" class="btn btn-primary">Kelola Data Gaji Karyawan Umum</button>
                      </a>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>