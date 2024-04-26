<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Rencana Produksi</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/simpan_produksi" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Pengadaan</label>
                      <input name="kode_pengadaan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Produksi</label>
                      <input name="kode_produksi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal Mulai</label>
                      <input name="tanggal_mulai" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal Selesai</label>
                      <input name="tanggal_selesai" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col">
                      <label for="exampleInputPassword1" class="form-label">Rencana Produksi</label>
                      <div>
                        <textarea name="rencana_produksi" id="" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label">Detail Produksi</label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="jenis_baju" name="jenis_baju[]">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="ukuran" name="ukuran[]">
                        </div>
                        </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label"> </label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="jenis_baju" name="jenis_baju[]">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="ukuran" name="ukuran[]">
                        </div>
                        </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label"> </label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="jenis_baju" name="jenis_baju[]">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="ukuran" name="ukuran[]">
                        </div>
                        </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label"> </label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="jenis_baju" name="jenis_baju[]">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="ukuran" name="ukuran[]">
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