<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex">
            <h5 class="card-title fw-semibold mt-2">Notifikasi</h5>
            <div
              style="width: 2svw; height: 2svw; background-color: <?php if ((int) $notifikasi[0]['notifikasi'] > 0): ?><?= '#5AB2FF' ?><?php else: ?><?= '#DDE6ED' ?><?php endif; ?>; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-left: 1svw; color: <?php if ((int) $notifikasi[0]['notifikasi'] > 0): ?><?= 'white' ?><?php else: ?><?= '#27374D' ?><?php endif; ?>;"
              class="circle">
              <?= $notifikasi[0]['notifikasi']; ?>
            </div>
          </div>
          <!-- <div class="card"> -->
          <!-- <div class="card-body"> -->
          <div class="d-flex justify-content-center overflow-scroll">
            <table class="table">
              <tr>
                <!-- <th>KODE</th> -->
                <th>TANGGAL</th>
                <!-- <th>BIAYA</th> -->
                <th>KEPERLUAN</th>
                <th>LAMPIRAN</th>
                <th class="d-flex justify-content-center">STATUS</th>
              </tr>
              <?php foreach ($permintaan as $p): ?>
                <?php if ($p['status'] != 'TOLAK'): ?>
                  <tr>
                    <td><?= date_format(date_create($p['tanggal']), "d F Y"); ?></td>
                    <td class=""><?= $p['keterangan']; ?></td>
                    <td><?php if ($p['file'] == '-'): ?>-<?php else: ?><a class="text-info"
                          href="/unduh_file/<?= $p['file']; ?>"><i
                            class="fa-solid fa-file-pdf me-1"></i>Unduh</a><?php endif; ?></td>
                    <td>
                      <div class="d-flex w-full gap-3">
                        <a href="<?= site_url('update-status-permintaan/' . $p['kode_permintaan'] . '/kredit') ?>"
                          class="w-100 btn btn<?= ($p['status'] == 'KREDIT') ? '' : '-outline' ?>-success">ACC</a>
                        <a href="<?= site_url('update-status-permintaan/' . $p['kode_permintaan'] . '/pending') ?>"
                          class="w-100 btn btn<?= ($p['status'] == 'PENDING') ? '' : '-outline' ?>-warning">PENDING</a>
                        <a href="<?= site_url('update-status-permintaan/' . $p['kode_permintaan'] . '/tolak') ?>"
                          class="w-100 btn btn<?= ($p['status'] == 'TOLAK') ? '' : '-outline' ?>-danger">TOLAK</a>
                      </div>
                    </td>
                  </tr>
                <?php endif ?>
              <?php endforeach; ?>

              
            </table>
            <!-- </div> -->
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-4">
    <?php if (session()->get("user")[0]["kode_akses"] == 'HRD'): ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Kehadiran Karyawan</h5><br>
          <?php if ($jumlahHadir[0]['kode_karyawan'] == 0): ?>
            <div class="d-flex align-items-start">
              <i class="fa-solid fa-circle-exclamation me-3"></i>
              <p>Absensi Belum Dilakukan!</p>
            </div>
          <?php else: ?>
            <div class="d-flex flex-column justify-content-center">
              <div class="d-flex mt-3 align-items-start">
                <i class="fa-solid fa-user-check me-3"></i>
                <p>&emsp;<strong><?= $jumlahHadir[0]['kode_karyawan']; ?></strong>&emsp;Hadir</p>

              </div>
              <div class="d-flex mt-3 align-items-start">
                <i class="fa-solid fa-user-xmark me-3"></i>
                <p>&emsp;<strong><?= $jumlahAbsen[0]['kode_karyawan']; ?></strong>&emsp;Tidak Hadir</p>

              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="card">
      <div class="card-body">
        <div class="d-flex">
          <h5 class="card-title fw-semibold">To Do List</h5>
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
            <?php foreach ($todo as $t): ?>
              <tr>
                <form action="/selesai_todo" method="post">
                  <input name="nomor" type="hidden" value="<?= $t['nomor'] ?>">
                  <td><?= $t['kegiatan'] ?></td>
                  <td>
                    <p class="text-end"><button class="btn btn-success">Done</button></p>
                  </td>
                </form>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>

    </div>

  </div>
</div>
</div>

<?= $this->endSection(); ?>