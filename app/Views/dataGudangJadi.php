<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar Data Gudang Jadi</h5>
      <div class="card">
        <div class="card-body">

          <table class="table table-hover mb-5">
            <thead>
              <tr>
                <th scope="col">KODE BARANG</th>
                <th scope="col">KODE PRODUKSI</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($gudang_jadi as $gj) : ?>
                <tr>
                  <th scope="row"><?= $gj["kode"] ?></th>
                  <td><?= $gj["kode_produksi"] ?></td>
                  <td><?= $gj["nama_pakaian"] ?></td>
                  <td>
                    <a href="/edit_gudang_jadi/<?= $gj["kode"] ?>" class="me-3">
                      <i class="bi bi-pencil-square"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>
                    <a href="/detail_gudang_jadi/<?= $gj["kode"] ?>" class="ms-3">
                      <i class="bi bi-three-dots"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                      </svg>
                    </a>
                    <a href="/delete_gudang_jadi/<?= $gj["kode"] ?>" class="ms-4" onclick="return confirm('Ingin menghapus data ini?')">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                      </svg>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <a href="/input_gudang_jadi"><button type="submit" class="btn btn-primary">+ Tambah Produk</button></a>

        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>