<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>
<div class="container-fluid">
  <div class="row">
    <div class="col-8">
    <div class="card">
            <div class="card-body">
              <div class="d-flex"><h5 class="card-title fw-semibold mt-1">Notifikasi</h5>
              <div style="width: 2svw; height: 2svw; background-color: <?php if((int)$notifikasi[0]['notifikasi'] > 0): ?><?= '#5AB2FF'?><?php else:?><?= '#DDE6ED'?><?php endif;?>; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-left: 1svw; color: <?php if((int)$notifikasi[0]['notifikasi'] > 0): ?><?= 'white'?><?php else:?><?= '#27374D'?><?php endif;?>;" class="circle">
                <?= $notifikasi[0]['notifikasi']; ?>
              </div>
            </div>
              <!-- <div class="card"> -->
                <!-- <div class="card-body"> -->
                <div class="d-flex justify-content-center">
                      <table class="table mt-3">
                        <tr>
                          <!-- <th>KODE</th> -->
                          <th>TANGGAL</th>
                          <!-- <th>BIAYA</th> -->
                          <th>KEPERLUAN</th>
                          <th>LAMPIRAN</th>
                          <th class="d-flex justify-content-center">STATUS</th>
                        </tr>
                        <tr>
                          <td colspan="4" class="text-center">Permintaan ACC</td>
                        </tr>
                        <?php if(count($permintaanAcc) == 0):?>
                        <tr>
                          <td colspan="4" class="text-center">-</td>  
                        </tr>
                        <?php endif; ?>
                        <?php foreach($permintaanAcc as $p) : ?>
                        <tr>
                          <td><?= date_format(date_create($p['tanggal']), "d F Y"); ?></td>
                          <td class=""><?= $p['keterangan']; ?></td>
                          <td><?php if($p['file'] == '-'):?>-<?php else:?><a class="text-info" href="/unduh_file/<?= $p['file']; ?>"><i class="fa-solid fa-file-pdf me-1"></i>Unduh</a><?php endif; ?></td>
                          <td>
                            <div class="d-flex w-full">
                              <button class="w-100 btn btn-<?php if($p['status'] == 'ACC'){echo'success';}elseif($p['status'] == 'PENDING'){echo'warning';}else{echo'danger';};?>"><?= $p['status'];?></button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td colspan="4" class="text-center">Permintaan REVISI</td>
                        </tr>
                        <?php if(count($permintaanRevisi) == 0):?>
                        <tr>
                          <td colspan="4" class="text-center">-</td>  
                        </tr>
                        <?php endif; ?> 
                        <?php foreach($permintaanRevisi as $p) : ?>
                        <tr>
                          <td><?= date_format(date_create($p['tanggal']), "d F Y"); ?></td>
                          <td class=""><?= $p['keterangan']; ?></td>
                          <td><?php if($p['file'] == '-'):?>-<?php else:?><a class="text-info" href="/unduh_file/<?= $p['file']; ?>"><i class="fa-solid fa-file-pdf me-1"></i>Unduh</a><?php endif; ?></td>
                          <td>
                            <div class="d-flex w-full">
                              <button class="w-100 btn btn-<?php if($p['status'] == 'ACC'){echo'success';}elseif($p['status'] == 'PENDING'){echo'warning';}else{echo'danger';};?>"><?= $p['status'];?></button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td colspan="4" class="text-center">Permintaan PENDING</td>
                        </tr>
                        <?php if(count($permintaanPending) == 0):?>
                        <tr>
                          <td colspan="4" class="text-center">-</td>  
                        </tr>
                        <?php endif; ?>
                        <?php foreach($permintaanPending as $p) : ?>
                        <tr>
                          <td><?= date_format(date_create($p['tanggal']), "d F Y"); ?></td>
                          <td class=""><?= $p['keterangan']; ?></td>
                          <td><?php if($p['file'] == '-'):?>-<?php else:?><a class="text-info" href="/unduh_file/<?= $p['file']; ?>"><i class="fa-solid fa-file-pdf me-1"></i>Unduh</a><?php endif; ?></td>
                          <td>
                            <div class="d-flex w-full">
                              <button class="w-100 btn btn-<?php if($p['status'] == 'ACC'){echo'success';}elseif($p['status'] == 'PENDING'){echo'warning';}else{echo'danger';};?>"><?= $p['status'];?></button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                <!-- </div> -->
                <!-- </div> -->
              </div>
            </div>
          </div>
    </div>
    <div class="col-4">
      <?php if(session()->get("user")[0]["kode_akses"] == 'HRD'):?>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Kehadiran Karyawan</h5><br>
              <?php if($jumlahHadir[0]['kode_karyawan'] == 0): ?>
                <div class="d-flex align-items-start">
                  <i class="fa-solid fa-circle-exclamation me-3"></i>
                  <p>Absensi Belum Dilakukan!</p>
                </div>
              <?php else:?>
                <div class="d-flex flex-column justify-content-center">
                  <div class="d-flex mt-3 align-items-start">
                    <i class="fa-solid fa-user-check me-3"></i>
                    <p>&emsp;<strong><?= $jumlahHadir[0]['kode_karyawan'];?></strong>&emsp;Hadir</p>

                  </div>
                  <div class="d-flex mt-3 align-items-start">
                    <i class="fa-solid fa-user-xmark me-3"></i>
                    <p>&emsp;<strong><?= $jumlahAbsen[0]['kode_karyawan'];?></strong>&emsp;Tidak Hadir</p>

                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
    <div class="card">
            <div class="card-body">
              <div class="d-flex"><h5 class="card-title fw-semibold">To Do List</h5>
            </div>
            <form action="/input_todo" class="mt-2" method="post">
              <div class="d-flex align-items-center">
                <textarea name="todo" type="text" class="form-control" placeholder="to do" id="todo"></textarea>
                <span>
                  <button class="btn btn-primary ms-3" type="submit">Save</button>
                </span>
              </div>
            </form>
            <div class="d-flex">
            <table class="table my-3 container">
              <?php foreach($todo as $t):?>
              <tr>
                <form action="/selesai_todo" method="post">
                  <input name="nomor" type="hidden" value="<?= $t['nomor']?>">
                  <td><?= $t['kegiatan']?></td>
                  <td><p class="text-end"><button class="btn btn-success">Done</button></p></td>
                </form>
              </tr>
              <?php endforeach;?>
            </table>
            </div>
            </div>
            
    </div>

    </div>
  </div>
</div>

<?= $this->endSection();?>