<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Daftar List Pegawai</h5>
              <div class="card mb-5">
                <div class="card-body">
                <?php if(session()->getFlashdata('sukses')):?>
                    <div onclick="(function(notif){
                      notif.style.display = 'none';
                      })(this)" id="notif" class="alert alert-success" role="alert">
                      <?= session()->getFlashdata('sukses')?>
                    </div>
                <?php elseif(session()->getFlashdata('edit')):?>
                    <div onclick="(function(notif){
                      notif.style.display = 'none';
                      })(this)" id="notif" class="alert alert-primary" role="alert">
                      <?= session()->getFlashdata('edit')?>
                    </div>
                <?php endif; ?>
                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                            <th scope="col">NOMOR KARYAWAN</th>
                            <th scope="col">NAMA KARYAWAN</th>
                            <th scope="col">KARYAWAN</th>
                            <th scope="col">JENIS KELAMIN</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($karyawan as $kar) : ?>
                            <tr>
                            <th scope="row"><?= $kar['kode']; ?></th>
                            <td><?= $kar['nama']; ?></td>
                            <?php if($kar['kode_jenis'] == "KP") : ?>
                              <td>Karyawan Produksi</td>
                            <?php elseif($kar['kode_jenis'] == "KU") : ?>
                              <td>Karyawan Umum</td>
                            <?php endif; ?>
                            <td><?= $kar['jenis_kelamin']; ?></td>
                            <td>
                                <a href="/edit_pegawai/<?= $kar['kode']; ?>" class="ms-3">
                                    <i class="bi bi-three-dots"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                    </svg>
                                </a>

                            </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
              </div>
              <h5 class="card-title fw-semibold mb-4 mt-5">Daftar List Pegawai <strong>Non-Aktif</strong></h5>
              <div class="card">
                <div class="card-body">
                    <table class="table table-danger mb-5">
                        <thead>
                            <tr>
                            <th scope="col">NOMOR KARYAWAN</th>
                            <th scope="col">NAMA KARYAWAN</th>
                            <th scope="col">KARYAWAN</th>
                            <th scope="col">JENIS KELAMIN</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($karyawan_nonaktif as $kar) : ?>
                            <tr>
                            <th scope="row"><?= $kar['kode']; ?></th>
                            <td><?= $kar['nama']; ?></td>
                            <?php if($kar['kode_jenis'] == "KP") : ?>
                              <td>Karyawan Produksi</td>
                            <?php elseif($kar['kode_jenis'] == "KU") : ?>
                              <td>Karyawan Umum</td>
                            <?php endif; ?>
                            <td><?= $kar['jenis_kelamin']; ?></td>
                            <td>
                                <a href="/edit_pegawai/<?= $kar['kode']; ?>" class="ms-3">
                                    <i class="bi bi-three-dots"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                    </svg>
                                </a>

                            </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>