<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

<div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Data detail transaksi</h5>
              <p class="card-title mb-4">NOTA TRANSAKSI : TR-001</p>
              <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                            <th scope="col">NAMA PRODUK</th>
                            <th scope="col">UKURAN</th>
                            <th scope="col">JUMLAH BELI</th>
                            <th scope="col">HARGA</th>
                            <th scope="col">SUB-TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <th scope="row">Kemeja</th>
                              <td>XL</td>
                              <td>2</td>
                              <td>400.000</td>
                              <td>800.000</td>
                            </tr>
                            <tr>
                              <th scope="row">Hem</th>
                              <td>M</td>
                              <td>1</td>
                              <td>500.000</td>
                              <td>500.000</td>
                            </tr>
                            <tr>
                              <th scope="row">Kemeja</th>
                              <td>S</td>
                              <td>4</td>
                              <td>300.000</td>
                              <td>1.200.000</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
                <a href="javascript:history.go(-1)" class="btn btn-dark">Kembali</a>
            </div>
          </div>
        </div>

<?= $this->endSection();?>