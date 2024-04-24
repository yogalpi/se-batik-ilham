<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Pengadaan</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/input_pengadaan" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Pengadaan</label>
                      <input name="kode_pengadaan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Kode Pengguna</label>
                      <input name="kode_pengguna" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input name="tanggal" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col">
                      <label for="exampleInputPassword1" class="form-label">Rencana Pengadaan</label>
                      <div>
                        <textarea name="rencana_pengadaan" id="" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jenis</label>
                      <input name="jenis" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Status</label>
                      <input name="status" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 row">
                    <label for="" class="col-sm-12 col-form-label">Detail Pengadaan</label>
                        
                        <div class="col-4">
                            <label for="" class="col-sm-12 col-form-label">Barang Kebutuhan</label>
                            <input type="text" class="form-control col-6" id="barang_kebutuhan" name="barang_kebutuhan[]">
                        </div>
                        <div class="col-4">
                            <label for="" class="col-sm-12 col-form-label">Estimasi Pengeluaran</label>
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="estimasi_pengeluaran[]">
                        </div>
                        <div class="col-4">
                            <label for="" class="col-sm-12 col-form-label">Supplier</label>
                            <input type="text" class="form-control col-6" id="supllier" name="supplier[]">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <!-- <label for="" class="col-sm-12 col-form-label">Detail Pengadaan</label> -->

                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="barang_kebutuhan" name="barang_kebutuhan[]">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="estimasi_pengeluaran" name="estimasi_pengeluaran[]">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="supplier" name="supplier[]">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <!-- <label for="" class="col-sm-12 col-form-label">Detail Pengadaan</label> -->

                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="barang_kebutuhan" name="barang_kebutuhan[]">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="estimasi_pengeluaran" name="estimasi_pengeluaran[]">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="supplier" name="supplier[]">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <!-- <label for="" class="col-sm-12 col-form-label">Detail Pengadaan</label> -->

                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="barang_kebutuhan" name="barang_kebutuhan[]">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="estimasi_pengeluaran" name="estimasi_pengeluaran[]">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="supplier" name="supplier[]">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>