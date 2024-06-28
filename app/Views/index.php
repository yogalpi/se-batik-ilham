<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Data Permintaan</h5>
              <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-center">
                    <!-- <div class="table-responsive mb-5"> -->
                      <table class="table">
                        <tr>
                          <th>KODE PERMINTAAN</th>
                          <th>TANGGAL</th>
                          <th>KETERANGAN</th>
                          <th>NOMINAL</th>
                          <th>KODE</th>
                          <th>STATUS</th>
                        </tr>
                          <tr>
                            <td>
                              <div class="m-1">
                                <p>1</p>
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                <p>07/06/2024</p>
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                <p>Membeli kain sebanyak 1000 Meter</p>
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                <p>10000000</p>
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                <p>AGBB001</p>
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                <p>Setuju</p>
                              </div>
                              
                            </td>
                          </tr>
                        </table>
                      <!-- </div> -->
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>