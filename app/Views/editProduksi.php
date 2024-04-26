<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Rencana Produksi</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/updateProduksi" method="post">
                    <div class="mb-3">
                      <label for="kode_produksi" class="form-label">Kode Produksi</label>
                      <input name="kode_produksi" type="text" value="<?=$produksi[0]["kode_produksi"]?>" class="form-control" id="kode_produksi" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                      <input name="tanggal_mulai" type="date" value="<?=$produksi[0]["tanggal_mulai"]?>" class="form-control" id="tanggal_mulai">
                    </div>
                    <div class="mb-3">
                      <label for="tanggal_selesai" class="form-label">Tanggal Akhir</label>
                      <input name="tanggal_selesai" type="date" value="<?=$produksi[0]["tanggal_selesai"]?>" class="form-control" id="tanggal_selesai">
                    </div>
                    <div class="mb-3 col">
                      <label for="rencana_produksi" class="form-label">Rencana Produksi</label>
                      <div>
                        <textarea name="rencana_produksi" id="rencana_produksi" class="form-control" rows="4"><?=$produksi[0]["rencana_produksi"]?></textarea>
                      </div>
                    </div>
                    <div class="mb-3 row">

                    <?php foreach($produksi as $prod):?>

                        <label for="" class="col-sm-12 col-form-label">Detail Produksi</label>

                        <div class="col-6">
                            <input type="text" class="form-control col-6" id="jenis_baju" value="<?=$prod["jenis_baju"]?>" name="jenis_baju[]">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control col-6" value="<?=$prod["ukuran"]?>" id="ukuran" name="ukuran[]">
                        </div>
                        </div>
                    <?php endforeach?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>