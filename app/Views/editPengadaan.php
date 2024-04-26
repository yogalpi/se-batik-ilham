<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Pengadaan</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/updatePengadaan" method="post">
                    <div class="mb-3">
                      <label for="kode_pengadaan" class="form-label">Kode Pengadaan</label>
                      <input name="kode_pengadaan" type="text" value="<?=$pengadaan[0]["kode_pengadaan"]?>" class="form-control" id="kode_pengadaan" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="kode_pengguna" class="form-label">Kode Pengguna</label>
                      <input name="kode_pengguna" type="text" value="<?=$pengadaan[0]["kode_pengguna"]?>" class="form-control" id="kode_pengadaan" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input name="tanggal" type="date" value="<?=$pengadaan[0]["tanggal"]?>" class="form-control" id="tanggal">
                    </div>
                    <div class="mb-3 col">
                      <label for="rencana_pengadaan" class="form-label">Rencana Pengadaan</label>
                      <div>
                        <textarea name="rencana_pengadaan" id="rencana_pengadaan" class="form-control" rows="4"><?=$pengadaan[0]["rencana_pengadaan"]?></textarea>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="jenis" class="form-label">Jenis</label>
                      <input name="jenis" type="text" value="<?=$pengadaan[0]["jenis"]?>" class="form-control" id="jenis">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Status</label>
                      <select name="status" id="" class="form-control">
                      <option <?= ($pengadaan[0]["status"] == "Dikirim" ? "selected" : "") ?> value="Dikirim">Dikirim</option>
                      <option <?= ($pengadaan[0]["status"] == "Dikemas" ? "selected" : "") ?> value="Dikemas">Dikemas</option>
                      <option <?= ($pengadaan[0]["status"] == "Dibatalkan" ? "selected" : "") ?> value="Dibatalkan">Dibatalkan</option>
                      </select>
              </div>
                    <div class="mb-3 row">

                        <?php foreach($pengadaan as $peng):?>

                        <div class="col-4">
                            <label for="detail_pengadaan" class="col-sm-12 col-form-label">Detail Pengadaan</label>
                            <input type="text" value="<?=$peng["kebutuhan"]?>" class="form-control col-6" id="detail_pengadaan" name="barang_kebutuhan[]">
                        </div>
                        <div class="col-4">
                            <label for="detail_pengadaan" class="col-sm-12 col-form-label">Detail Pengadaan</label>
                            <input type="text" values="<?=$peng["biaya"]?>"class="form-control col-6" id="detail_pengadaan" name="estimasi_pengeluaran[]">
                        </div>
                        <div class="col-4">
                            <label for="detail_pengadaan" class="col-sm-12 col-form-label">Detail Pengadaan</label>
                            <input type="text" value="<?=$peng["kode_supplier"]?>" class="form-control col-6" id="detail_pengadaan" name="supplier[]">
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