<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Aset</h5>
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Aset</label>
                      <input name="kode_aset" type="text" class="form-control" id="kode_aset" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
                      <input name="aset" type="text" class="form-control" id="aset">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jenis Aset</label>
                      <input name="jenis_aset" type="text" class="form-control" id="jenis_aset">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                      <input name="jumlah" type="number" class="form-control" id="jumlah">
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputPassword1" class="form-label">Tanggal Pembelian</label>
                      <input name="tanggal" type="date" class="form-control" id="tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>