<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Pengadaan</h5>
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post">
                    <div class="mb-3">
                      <label for="kode_pengadaan" class="form-label">Kode Pengadaan</label>
                      <input name="kode_pengadaan" type="text" class="form-control" id="kode_pengadaan" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="jenis" class="form-label">Jenis</label>
                      <input name="jenis" type="date" class="form-control" id="jenis">
                    </div>
                    <div class="mb-3 col">
                      <label for="rencana_pengadaan" class="form-label">Rencana Pengadaan</label>
                      <div>
                        <textarea name="rencana_pengadaan" id="rencana_pengadaan" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="mb-3 row">
                        
                        <div class="col-4">
                            <label for="detail_pengadaan" class="col-sm-12 col-form-label">Detail Pengadaan</label>
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <label for="detail_pengadaan" class="col-sm-12 col-form-label">Detail Pengadaan</label>
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <label for="detail_pengadaan" class="col-sm-12 col-form-label">Detail Pengadaan</label>
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <!-- <label for="" class="col-sm-12 col-form-label">Detail Pengadaan</label> -->

                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <!-- <label for="" class="col-sm-12 col-form-label">Detail Pengadaan</label> -->

                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <!-- <label for="" class="col-sm-12 col-form-label">Detail Pengadaan</label> -->

                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-6" id="detail_pengadaan" name="detail-pengadaan">
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