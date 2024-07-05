<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<?php
  $kode_permintaan = (int)$hitungan[0]['hitung'] + 1;
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Form Permintaan</h5>
      <div class="card">
        <div class="card-body">
          <form action="/simpan_permintaan" method="post">
            <div class="col-4">
              <label for="exampleInputEmail1" class="form-label">Kode Permintaan</label>
              <input name="kode_permintaan" type="text" value="<?php $permintaan = (int)$permintaan[0]['kode_permintaan']; if($permintaan == 0) :?> <?= '1'.$permintaan; ?> <?php elseif($permintaan < 10) :?> <?= ''.$permintaan; ?><?php elseif($permintaan >= 10 && $permintaan < 100) :?> <?= ''.$permintaan ?><?php else :?> <?= '-'.$permintaan; ?><?php endif; ?>" class="form-control" id="exampleInputEmail1" readonly
                aria-describedby="emailHelp">
            </div>
            <div class="col-4">
              <label for="exampleInputEmail1" class="form-label">Tanggal</label>
              <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                <input name="keterangan" type="text" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="col-4">
                <label for="exampleInputPassword1" class="form-label">Nominal</label>
                <input name="nominal" type="number" class="form-control" id="exampleInputPassword1">
              </div>
            
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>