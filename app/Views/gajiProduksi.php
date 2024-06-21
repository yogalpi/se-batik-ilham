<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
        <div class="container-aksi">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Permintaan Keuangan</h5>
                    <?php if(session()->getFlashdata('permintaan')):?>
                      <div onclick="(function(notif){
                        notif.style.display = 'none';
                        })(this)" id="notif" class="alert alert-info" role="alert">
                        <?= session()->getFlashdata('permintaan')?>
                      </div>
                  <?php elseif(session()->getFlashdata('tolak')):?>
                      <div onclick="(function(notif){
                        notif.style.display = 'none';
                        })(this)" id="notif" class="alert alert-warning" role="alert">
                        <?= session()->getFlashdata('tolak')?>
                      </div>
                  <?php endif;?>
                    <form action="/input_permintaan_gaji_produksi" method="post" enctype="multipart/form-data">
                      <div class="row col-4">
                      <label for="exampleInputEmail2" class="form-label mt-2">Pilih Kode Produksi</label>
                        <select name="kode_produksi" type="text" class="form-control mb-3 ms-2" id="kode_produksi_gaji">
                          <option selected value="0">-- Pilih Kode Produksi --</option>
                            <?php if(isset($produksi)): ?>
                            <?php foreach($produksi as $p) : ?>
                              <option value="<?= $p['kode_produksi']?>"><?= $p['kode_produksi']?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                      </div>
                      <div class="row col-4">
                    <div class="mb-4 mt-3">
                      <label for="dokumen" class="form-label">Sisipkan Dokumen</label>
                      <input name="laporan" type="file" class="form-control" id="dokumen">
                    </div>
                    </div>
                      <button type="submit" class="btn btn-secondary mt-3" id="ajukan_permintaan">Ajukan Permintaan</button><br>
                    </form>
                  </div>
              </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Gaji Karyawan Produksi</h5>
              <div class="card">
                <div class="card-body">
                  <div class="row col-5">
                    
                    <form action="/laporan_gaji_pegawai_produksi_pdf" method="post">
                      <label for="exampleInputEmail2" class="form-label mt-2">Pilih Kode Produksi</label>
                      <select name="kode_produksi" type="text" class="form-control mb-3" id="kode_produksi_gaji">
                        <option selected value="0">-- Pilih Kode Produksi --</option>
                          <?php if(isset($produksi)): ?>
                          <?php foreach($produksi as $p) : ?>
                            <option value="<?= $p['kode_produksi']?>"><?= $p['kode_produksi']?></option>
                          <?php endforeach; ?>
                          <?php endif; ?>
                      </select>
                      </div>
                      
                      <button type="submit" class="btn btn-dark">Cetak Laporan Gaji Pegawai</button>

                      </form>

                      <a href="/input_gaji_produksi"><button class="btn btn-primary ms-3">+ Tambah Gaji Pegawai</button></a>
                      
                  <div class="container mb-4"></div>
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
                  <?php elseif(session()->getFlashdata('hapus')):?>
                      <div onclick="(function(notif){
                        notif.style.display = 'none';
                        })(this)" id="notif" class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('hapus')?>
                      </div>
                  <?php endif; ?>
                    <table class="table table-hover mb-5 mt-5">
                        <thead>
                          <tr>
                            <th scope="col">KODE GAJI</th>
                            <th scope="col">KODE KARYAWAN</th>
                            <th scope="col">NAMA KARYAWAN</th>
                            <th scope="col">JUMLAH PRODUKSI</th>
                            <th scope="col">TOTAL GAJI</th>
                            <th scope="col">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($gaji as $g) : ?>
                          
                            <tr>
                            <th scope="row"><?= $g['kode_gaji']; ?></th>
                            <th scope="row"><?= $g['kode']; ?></th>
                            <td><?= $g['nama']; ?></td>
                            <td><?= $g['jumlah_produksi']; ?></td>
                            <td><?= $g['total_gaji']; ?></td>
                            <td class="d-flex justify-content-star">
                                <a href="edit_gaji_pegawai_produksi/<?= $g['kode_gaji']; ?>" class="me-3">
                                    <i class="bi bi-three-dots"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                    </svg>
                                </a>  
                                <a data-toggle="modal" data-target="#exampleModalCenter" class="me-3" onclick="(function(teks){
                                  document.getElementById('teks_modal').innerHTML = 'Apakah Anda Yakin Ingin Menghapus Data Penggajian <strong><?= $g['nama']; ?> (<?= $g['kode']; ?>)</strong> Kode Penggajian <strong><?= $g['kode_gaji']; ?></strong> ?';
                                  document.getElementById('formDelete').setAttribute('action', '/hapus_gaji_produksi/<?= $g['kode_gaji']; ?>/<?= $g['kode']; ?>/<?= $g['nama']; ?>');
                                  })(this)">
                                  <i class="bi bi-trash-fill">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                    </svg>
                                  </i>
                                </a>
                            </td>
                            </tr>

                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Pemberitahuan</h5>
                                    </div>
                                    <div id="teks_modal" class="modal-body">
                                      
                                    </div>
                                    <div class="modal-footer">
                                      <form action="" id="formDelete" method="post">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-primary" >Konfirmasi</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<?= $this->endSection();?>