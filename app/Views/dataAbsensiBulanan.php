<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
              <h5 class="card-title fw-semibold mb-4">Daftar Absensi Karyawan Bulan <?php if(session()->getFlashdata('bulan')) : ?> <?= session()->getFlashdata('bulan'); ?> <?php endif; ?></h5>
              </div>
              <div class="card">
                <div id="cari" class="mt-5 ms-5 col-8">
                <form action="/filter_absen" method="post">
                      <label for="exampleInputEmail1" class="form-label">Filter Berdasarkan Bulan</label>
                      <div class="d-flex col-5 mt-3">
                        <select name="bulan" type="text" class="form-control mr-3" id="karyawan" aria-describedby="emailHelp">
                          <option selected hidden value="0">-- Pilih Bulan --</option>
                          <option value="0">-- Seluruh Data --</option>
                          <option id="bulan" value="1">Januari</option>
                          <option id="bulan" value="2">Februari</option>
                          <option id="bulan" value="3">Maret</option>
                          <option id="bulan" value="4">April</option>
                          <option id="bulan" value="5">Mei</option>
                          <option id="bulan" value="6">Juni</option>
                          <option id="bulan" value="7">Juli</option>
                          <option id="bulan" value="8">Agustus</option>
                          <option id="bulan" value="9">September</option>
                          <option id="bulan" value="10">Oktober</option>
                          <option id="bulan" value="11">November</option>
                          <option id="bulan" value="12">Desember</option>
                        </select>
                        <button type="submit" class="btn btn-primary mx-3">Cari</button>
                      </div>
                    </div>
                </form>
                <div class="card-body">
                  <?php if(session()->getFlashdata('edit')):?>
                    <div onclick="(function(notif){
                      notif.style.display = 'none';
                      })(this)" id="notif" class="alert alert-primary" role="alert">
                        <?= session()->getFlashdata('edit')?>
                    </div>
                  <?php endif; ?>
                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                            <th scope="col">KODE KARYAWAN</th>
                            <th scope="col">NAMA KARYAWAN</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($karyawan as $k) : ?>
                            <tr>
                            <th scope="row"><?= $k['kode']; ?></th>
                            <td><?= $k['nama']; ?></td>
                            <td><?= $k['tanggal']; ?></td>
                            <td><?= $k['status']; ?></td>
                            <td>
                                <a href="/edit_absensi_pegawai/<?= $k['kode']; ?>/<?= $k['tanggal']?>" class="ms-3">
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

                    <a href="/absensi_pegawai"><button class="btn btn-primary">+ Tambah Data Absensi</button></a>

                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>