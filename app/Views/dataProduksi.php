<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>


<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar List Produksi</h5>
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
                
                <th scope="col">KODE PRODUKSI</th>
                <th scope="col">TANGGAL MULAI</th>
                <th scope="col">TANGGAL SELESAI</th>
                <th scope="col">RENCANA PRODUKSI</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produksi as $prod): ?>
                <tr>
                  
                  <td scope="row"><?= $prod["kode_produksi"] ?></td>
                  <td scope="row"><?= date_format(date_create($prod['tanggal_mulai']), "d F Y"); ?></td>
                  <td scope="row"><?= date_format(date_create($prod['tanggal_selesai']), "d F Y"); ?></td>
                  <td scope="row"><?= $prod["rencana_produksi"] ?></td>
                  <td>
                    <a href="/editProduksi/<?= $prod["kode_produksi"] ?>" class="me-3">
                      <i class="bi bi-pencil-square"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>
                    <a href="/detail_produksi/<?= $prod["kode_produksi"] ?>" class="ms-3">
                      <i class="bi bi-three-dots"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path
                          d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                      </svg>
                    </a>
                    
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

          <a href="/input_produksi"><button type="submit" class="btn btn-primary">+ Tambah Data Produksi</button></a>

        </div>
      </div>
      <div class="card">
        <div class="card-body">

        <h5 class="card-title fw-semibold mb-4">Stok Barang</h5>
          <table class="table table-hover mb-5">
            <thead>
              <tr>
                
                <th scope="col">NAMA BARANG</th>
                <th scope="col">JUMLAH</th>
                <th scope="col">SATUAN</th>
                <th scope="col">TANGGAL</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bahan_baku as $bb): ?>
                <tr>
                  
                  <td scope="row"><?= $bb["nama_barang"] ?></td>
                  <td scope="row"><?= $bb["jumlah"] ?></td>
                  <td scope="row"><?= $bb["satuan"] ?></td>
                  <td scope="row"><?= $bb["tanggal"] ?></td>
                  
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>