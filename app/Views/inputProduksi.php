<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Rencana Produksi</h5>
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Produksi</label>
                      <input name="kode_produksi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal Mulai</label>
                      <input name="tanggal_mulai" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal Akhir</label>
                      <input name="tanggal_akhir" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col">
                      <label for="exampleInputPassword1" class="form-label">Rancangan Pengadaan</label>
                      <div>
                        <textarea name="rancangan_pengadaan" id="" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label">Detail Produksi</label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
                        </div>
                        </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label"> </label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
                        </div>
                        </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label"> </label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
                        </div>
                        </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-12 col-form-label"> </label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" id="detail_produksi" name="detail-produksi">
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