<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<style>
::-webkit-scrollbar {
  display:none;
}
</style>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar List Pengadaan</h5>
      <div class="card">
        <div class="card-body overflow-scroll">

        <?php if (session()->getFlashdata('sukses')): ?>
            <div onclick="(function(notif){
              notif.style.display = 'none';
            })(this)" id="notif" class="alert alert-success" role="alert">
              <?= session()->getFlashdata('sukses') ?>
            </div>
          <?php endif; ?>

          <table class="table table-hover mb-5 text-nowrap">
            <thead>
              <tr>
                <th scope="col">KODE PENGADAAN</th>
                <th scope="col">NAMA PENGGUNA</th>
                <th scope="col" class="px-5" >TANGGAL</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">JUMLAH BARANG</th>
                <th scope="col">SATUAN</th>
                <th scope="col" class="px-5" >HARGA</th>
                <th scope="col" class="px-5">TOTAL HARGA</th>
                <th scope="col">SUPPLIER</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengadaan as $peng): ?>
                <tr>
                  <td scope="row"><?= $peng["kode_pengadaan"] ?></td>
                  <td scope="row"><?= $peng["nama_pengguna"] ?></td>
                  <td scope="row"><?= date_format(date_create($peng['tanggal']), "d F Y"); ?></td>
                  <td scope="row"><?= $peng["nama_barang"] ?></td>

                  <td scope="row"><?= $peng["jumlah_barang"] ?></td>
                  <td scope="row"><?= $peng["satuan"] ?></td>
                  <td scope="row">Rp.<?= number_format( $peng["harga"],0,'.','.') ?></td>
                  <td scope="row">Rp. <?= number_format( $peng["total_harga"],0,'.','.') ?></td>
                  <td scope="row"><?= $peng["nama_supplier"] ?></td>
                  <td class="d-flex">
                    <a href="/editPengadaan/<?= $peng["kode_pengadaan"] ?>" class="me-3">
                      <i class="bi bi-pencil-square"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>
                    

                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

          <a href="/input_pengadaan"><button type="submit" class="btn btn-primary">+ Tambah Pengadaan</button></a>

        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>