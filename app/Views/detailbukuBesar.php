<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Edit Uang</h5>
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post">
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Akun</label>
                      <input name="nama_akun" value="Pendapatan" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input name="tanggal" value="2024-01-05" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jumlah Kredit</label>
                      <input name="jumlah_kredit" value="100.000" type="number" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5 col">
                      <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                      <div>
                        <textarea name="keterangan" id="" class="form-control" rows="4">pendapatan penjualan bulan 1</textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection();?>