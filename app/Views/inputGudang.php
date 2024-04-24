<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Data Bahan Baku</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/input_gudang" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
                      <input name="kode_barang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Kode Produksi</label>
                      <input name="kode_produksi" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
                      <input name="nama_barang" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                      <input name="jumlah" type="number" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputPassword1" class="form-label">Jenis Barang</label>
                      <input name="jenis" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5 col">
                      <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                      <div>
                        <textarea name="keterangan" id="" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input name="tanggal" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>