<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Form Pengadaan</h5>
      <div class="card">
        <div class="card-body">
          <form action="/input_pengadaan" method="post">
            <div class="col-4">
              <label for="exampleInputEmail1" class="form-label">Kode Pengadaan</label>
              <input value="<?php $p = (int)$pengadaan[0]['kode_pengadaan']; if($p == 0) :?> <?= 'PN-00'.$p; ?> <?php elseif($p < 10) :?> <?= 'PN-00'.$p; ?><?php elseif($p >= 10 && $p < 100) :?> <?= 'PN-0'.$p; ?><?php else :?> <?= 'PN-'.$p; ?><?php endif; ?>" name="kode_pengadaan" type="text" class="form-control border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="col-4">
              <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
              <select name="kode" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                <option selected>-- Pilih Nama Pengguna --</option>
                <?php foreach ($pengguna as $p): ?>
                  <option value="<?= $p['kode'] ?>"><?= $p['nama'] ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
              <div class="col-4">
                <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                <input name="tanggal" type="date" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="col-4">
              <label for="exampleInputEmail1" class="form-label">Nama barang</label>
              <select name="kode_barang" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                <option selected>-- Pilih Nama Barang --</option>
                <?php foreach ($gudang_bahan as $g): ?>
                  <option value="<?= $g['kode_barang'] ?>"><?= $g['nama_barang'] ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
              <div class="col-4">
                <label for="exampleInputPassword1" class="form-label">Jumlah Barang</label>
                <input name="jumlah_barang" type="text" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="col-4">
                <label for="exampleInputPassword1" class="form-label">Satuan</label>
                  <select name="satuan" id="satuan" class="form-control">
                        <option value="Meter">Meter</option>
                        <option value="PCS">PCS</option>
                        <option value="Bungkus">Bungkus</option>
                  </select>
              </div>
              <div class="col-4">
                <label for="exampleInputPassword1" class="form-label">Harga</label>
                <input name="harga" type="text" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="col-4">
              <label for="exampleInputEmail1" class="form-label">Nama Supplier</label>
              <select name="kode_supplier" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                <option selected>-- Pilih Supplier --</option>
                <?php foreach ($supplier as $s): ?>
                  <option value="<?= $s['kode_supplier'] ?>"><?= $s['nama'] ?> </option>
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