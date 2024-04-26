<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Bahan Baku</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/updateGudang" method="post">
                    <div class="mb-3">
                      <label for="kode_barang" class="form-label">Kode Barang</label>
                      <input name="kode_barang" type="text" value="<?=$gudangBahan[0]["kode_barang"]?>" class="form-control" id="kode_barang" readonly aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="kode_produksi" class="form-label">Kode Produksi</label>
                      <input name="kode_produksi" type="text" value="<?=$gudangBahan[0]["kode_produksi"]?>" class="form-control" id="kode_produksi" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nama_barang" class="form-label">Nama Barang</label>
                      <input name="nama_barang" type="text" value="<?=$gudangBahan[0]["nama_barang"]?>" class="form-control" id="nama_barang">
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah</label>
                      <input name="jumlah" type="number" value="<?=$gudangBahan[0]["jumlah"]?>" class="form-control" id="jumlah">
                    </div>
                    <div class="mb-5">
                      <label for="jenis_barang" class="form-label">Jenis Barang</label>
                      <input name="jenis" type="text" value="<?=$gudangBahan[0]["jenis"]?>" class="form-control" id="jenis">
                    </div>
                    <div class="mb-5 col">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <div>
                        <textarea name="keterangan" id=""  class="form-control" rows="4"><?=$gudangBahan[0]["keterangan"]?></textarea>
                      </div>
                    </div>
                    <div class="mb-5">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input name="tanggal" type="date" value="<?=$gudangBahan[0]["tanggal"]?>" class="form-control" id="tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>