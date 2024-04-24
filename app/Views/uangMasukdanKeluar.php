<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Uang Masuk</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/simpanUang" method="post">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode</label>
                      <input name="kode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                      <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Status</label>
                      <select class="form-select" aria-label="Default select example" name="status">
                        <option selected></option>
                        <option value="debet">Debet</option>
                        <option value="kredit">Kredit</option>
                      </select>
                     </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                      <input name="jumlah" type="number" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Kode Pengguna</label>
                      <input name="kode_pengguna" type="text" class="form-control" id="exampleInputPassword1" value="<?=session()->get("user")[0]["kode"]?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>