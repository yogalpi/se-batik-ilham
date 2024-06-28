<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Form Edit Pengadaan</h5>
      <div class="card">
        <div class="card-body">
          <form action="/updatePengadaan" method="post">
            <div class="col-4">
              <label for="kode_pengadaan" class="form-label">Kode Pengadaan</label>
              <input name="kode_pengadaan" type="text" value="<?= $pengadaan[0]["kode_pengadaan"] ?>" class="form-control"
                id="kode_pengadaan" readonly aria-describedby="emailHelp">
            </div>
            <div class="col-4">
              <label for="kode" class="form-label">Nama Pengguna</label>
              <select name="kode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <option selected value="">-- Pilih Kode Pengadaan --</option>
                <?php foreach ($pengguna as $p): ?>
                  <option <?php if($p['kode'] == $pengadaan[0]['kode']) :?><?= 'selected'; ?><?php endif; ?> value="<?= $p['kode'] ?>"><?= $p['nama'] ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-4">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input name="tanggal" type="date" value="<?= $pengadaan[0]["tanggal"] ?>" class="form-control" id="tanggal">
            </div>
            <div class="col-4">
              <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
              <select name="kode_barang" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                <option selected>-- Pilih Kode Pengadaan --</option>
                <?php foreach ($gudang_bahan as $g): ?>
                  <option <?php if($g['kode_barang'] == $pengadaan[0]['kode_barang']) :?><?= 'selected'; ?><?php endif; ?> value="<?= $g['kode_barang'] ?>"><?= $g['nama_barang'] ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-4">
              <label for="exampleInputPassword1" class="form-label">Jumlah Barang</label>
              <input name="jumlah_barang" type="text" value="<?= $pengadaan[0]["jumlah_barang"] ?>" class="form-control"
                id="exampleInputPassword1">
            </div>
            <div class="col-4">
              <label for="exampleInputPassword1" class="form-label">Satuan</label>
              <label for="jenis" class="form-label">Satuan</label>
                 <select name="satuan" id="" class="form-control">
                      <option <?= ($pengadaan[0]["satuan"] == "Meter" ? "selected" : "") ?> value="Meter">Meter</option>
                      <option <?= ($pengadaan[0]["satuan"] == "PCS" ? "selected" : "") ?> value="PCS">PCS</option>
                      <option <?= ($pengadaan[0]["satuan"] == "Bungkus" ? "selected" : "") ?> value="Bungkus">Bungkus</option>
                </select>
            </div>
            <div class="col-4">
              <label for="exampleInputPassword1" class="form-label">Harga</label>
              <input name="harga" type="text" value="<?= $pengadaan[0]["harga"] ?>" class="form-control"
                id="exampleInputPassword1">
            </div>
            <div class="col-4">
              <label for="exampleInputPassword1" class="form-label">Supplier</label>
              <select name="kode_supplier" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                <option selected>-- Pilih Kode Pengadaan --</option>
                <?php foreach ($supplier as $s): ?>
                  <option <?php if($s['kode_supplier'] == $pengadaan[0]['kode_supplier']) :?><?= 'selected'; ?><?php endif; ?> value="<?= $s['kode_supplier'] ?>"><?= $s['nama'] ?> </option>
                <?php endforeach; ?>
              </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>