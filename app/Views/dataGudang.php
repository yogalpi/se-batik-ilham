<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
  <div class="card">

    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar Data Bahan Baku</h5>
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
                <th scope="col">KODE BARANG</th>
                
                <th scope="col">NAMA BARANG</th>
                <th scope="col">JUMLAH</th>
                <th scope="col">SATUAN</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($gudangBahan as $dp): ?>
                <tr>
                  <td scope="row"><?= $dp["kode_barang"] ?></td>
                  
                  <td scope="row"><?= $dp["nama_barang"] ?></td>
                  <td scope="row"><?= $dp["jumlah"] ?></td>
                  <td scope="row"><?= $dp["satuan"] ?></td>
                  <td scope="row"><?= $dp["keterangan"] ?></td>
                  <td scope="row"><?= $dp["tanggal"] ?></td>
                  <td class="d-flex">
                    <a href="/editGudang/<?= $dp["kode_barang"] ?>" class="mx-1">
                      <i class="bi bi-pencil-square"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>
                    <a href="/deleteGudang/<?= $dp["kode_barang"] ?>" class="mx-1">
                      <i class="bi bi-trash"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash" viewBox="0 0 16 16">
                        <path
                          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path
                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                      </svg>
                    </a>

                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

          <a href="/input_gudang"><button type="submit" class="btn btn-primary">+ Tambah Data Bahan Baku</button></a>

        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      
      <h5 class="card-title fw-semibold mb-4">Daftar Data Bahan Masuk</h5>
      <div class="card">
        <div class="card-body">
          

          <table class="table table-hover mb-5">
            <thead>
              <tr>
                
                
                <th scope="col">TANGGAL</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">JUMLAH</th>
                <th scope="col">SATUAN</th>
                
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengadaan as $p): ?>
                <tr>
                  
                  <td scope="row"><?= $p["tanggal"] ?></td>
                  <td scope="row"><?= $p["nama_barang"] ?></td>
                  <td scope="row"><?= $p["jumlah_barang"] ?></td>
                  <td scope="row"><?= $p["satuan"] ?></td>
                  
                  
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar Data Bahan Keluar</h5>
      <div class="card">
        <div class="card-body">
          

          <table class="table table-hover mb-5">
            <thead>
              <tr>
                <th scope="col">TANGGAL</th>
                <th scope="col">NAMA BARANG</th>
                
                <th scope="col">JUMLAH BARANG</th>
                <th scope="col">SATUAN</th>
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($detail_produksi as $dp): ?>
                <tr>
                  <td scope="row"><?= $dp["tanggal_mulai"] ?></td>
                  <td scope="row"><?= $dp["nama_barang"] ?></td>
                  <td scope="row"><?= $dp["jumlah_barang"] ?></td>
                  <td scope="row"><?= $dp["satuan"] ?></td>
                  
                  
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