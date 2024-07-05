<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>


<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar List Permintaan</h5>
      <div class="card">
        <div class="card-body">
        <?php if (session()->getFlashdata('sukses')): ?>
            <div onclick="(function(notif){
              notif.style.display = 'none';
            })(this)" id="notif" class="alert alert-success" role="alert">
              <?= session()->getFlashdata('sukses') ?>
            </div>
            <?php endif; ?>
          <table class="table table-hover mb-5">
            <thead>
              <tr>
                <th scope="col">KODE PERMINTAAN</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">NOMINAL</th>
                <th scope="col">KODE</th>
                <th scope="col">STATUS</th>
              
              </tr>
            </thead>
            <tbody>
              <?php foreach ($permintaan as $peng): ?>
                <tr>
                  <td scope="row"><?= $peng["kode_permintaan"] ?></td>
                  <td scope="row"><?= date_format(date_create($peng['tanggal']), "d F Y"); ?></td>
                  <td scope="row"><?= $peng["keterangan"] ?></td>
                  <td scope="row">Rp.<?= number_format( $peng["nominal"],0,'.','.') ?></td>
                  <td scope="row"><?= $peng["kode"] ?></td>
                  <td scope="row"><?= $peng["status"] ?></td>
                    
              <?php endforeach ?>
            </tbody>
          </table>

          <a href="/input_permintaan"><button type="submit" class="btn btn-primary">+ input permintaan</button></a>

        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>