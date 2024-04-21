<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Data Uang Masuk</h5>
              <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                            <th scope="col">KODE</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">JUMLAH</th>
                            <th scope="col">KETERANGAN</th>
                            <th scope="col">KODE PENGGUNA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($keuangan as $uang):?>
                            <tr>
                            <td scope="row"><?php echo($uang['kode'])?></td>
                            <td scope="row"><?php echo($uang['tanggal'])?></td>
                            <td scope="row"><?php echo($uang['status'])?></td>
                            <td scope="row"><?php echo($uang['jumlah'])?></td>
                            <td scope="row"><?php echo($uang['keterangan'])?></td>
                            <td scope="row"><?php echo($uang['kode_pengguna'])?></td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                        <tbody>
                            <tr>
                            </tr>
                        </tbody>
                    </table>

                    <a href="/uangMasukdanKeluar"><button type="submit" class="btn btn-primary">+ Tambah Uang Masuk</button></a>

                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>