<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Data Pelanggan</h5>
              <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                            <th scope="col">KODE PELANGGAN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NOMOR HP</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">P-001</th>
                            <td>Gundol</td>
                            <td>088757656</td>
                            <td>kok@gmail.com</td>
                            <td>Aktif</td>
                            <td>
                        </td>
                    </tr>
              </tbody>
                        <tbody>
                            <tr>
                            <th scope="row">P-002</th>
                            <td>Bubu</td>
                            <td>089756564</td>
                            <td>awk@gmail.com</td>
                            <td>Deaktif</td>
                            <td>
                        </td>
                    </tr>
              </tbody>
                        <tbody>
                            <tr>
                            <th scope="row">P-003</th>
                            <td>Toi</td>
                            <td>088765674</td>
                            <td>aow@gmail.com</td>
                            <td>Aktif</td>
                            <td>
                        </td>
                    </tr>
              </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>