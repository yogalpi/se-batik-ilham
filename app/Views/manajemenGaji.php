<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Pengelolaan Gaji Karyawan</h5>
              <div class="card">
                <div class="card-body d-flex justify-content-center w-full">
                    <a class="m-5" href="/gaji_produksi">
                        <button type="submit" class="btn btn-primary">Kelola Data Gaji Karyawan Produksi</button>
                    </a>
                    <a class="m-5" href="/gaji_umum">
                        <button type="submit" class="btn btn-primary">Kelola Data Gaji Karyawan Umum</button>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>