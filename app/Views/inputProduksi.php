<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>
<?= service('Validation')->listErrors(); ?>
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Rencana Produksi</h5>
      <div class="card">
        <div class="card-body">
        <?php if (session()->getFlashdata('max')): ?>
            <div onclick="(function(notif){
              notif.style.display = 'none';
            })(this)" id="notif" class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('max') ?>
            </div>
          <?php endif; ?>
          <form action="/simpan_produksi" method="post">
            <div class="mb-3">
              
            <div class="col-4">
              <label for="exampleInputEmail1" class="form-label">Kode Produksi</label>
              <input value="<?php $prod = (int)$produksi[0]['kode_produksi']; if($prod == 0) :?><?= 'PR-00'.$prod; ?><?php elseif($prod < 10) :?><?= 'PR-00'.$prod; ?><?php elseif($prod >= 10 && $prod < 100) :?><?= 'PR-0'.$prod ?><?php else :?><?= 'PR-'.$prod; ?><?php endif; ?>" name="kode_produksi" type="text" class="form-control border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="col-4">
              <label for="exampleInputPassword1" class="form-label">Tanggal Mulai</label>
              <input name="tanggal_mulai" type="date" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col-4">
              <label for="exampleInputPassword1" class="form-label">Tanggal Selesai</label>
              <input name="tanggal_selesai" type="date" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 col">
              <label for="exampleInputPassword1" class="form-label">Rencana Produksi</label>
              <div>
                <textarea name="rencana_produksi" id="" class="form-control" rows="4"></textarea>
              </div>
            </div>

            <table class="table" id="mytable">
              <thead>
                <tr>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr id="mytr">
                  <td>
                  <select name="kode_barang[]" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                <option selected value="">-- Pilih Nama Barang --</option>
                <?php foreach ($bahan_baku as $bb): ?>
                  <option value="<?= $bb['kode_barang'] ?>"><?= $bb['nama_barang'] ?> </option>
                <?php endforeach; ?>
              </select>
                  </td>
                  
                  <td>
                    <input name="jumlah_barang[]" type="number" class="form-control" id="exampleInputPassword1">
                  </td>
                  <td>
                  <select name="satuan[]" id="satuan" class="form-control">
                        <option value="Meter">Meter</option>
                        <option value="PCS">PCS</option>
                        <option value="Bungkus">Bungkus</option>
                  </select>
                  </td>
                  <td>
                    <span href="#" class="btn btn-outline-danger form-control delete-row" onclick="(function(){
                      document.querySelectorAll('.delete-row').forEach(function(button) {
                          button.addEventListener('click', function() {
                            this.parentNode.parentNode.remove();
                          });
                      });
                    }())">Hapus</span>
                  </td>
                </tr>
              </tbody>
            </table>

            

            <div class="d-flex justify-content-center mb-5">
              <span class="rounded-circle" onclick="addRowProduksi()">
              <i class="fa-solid fa-square-plus fa-xl"></i>
              </span>
            </div>

          
                    <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function addRowProduksi(){
    var tr = `<tr id="mytr">
                  <td>
                  <select name="kode_barang[]" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                <option selected value="">-- Pilih Nama Barang --</option>
                <?php foreach ($bahan_baku as $bb): ?>
                  <option value="<?= $bb['kode_barang'] ?>"><?= $bb['nama_barang'] ?> </option>
                <?php endforeach; ?>
              </select>
                  </td>
                  
                  <td>
                    <input name="jumlah_barang[]" type="number" class="form-control" id="exampleInputPassword1">
                  </td>
                  <td>
                  <select name="satuan[]" id="satuan" class="form-control">
                        <option value="Meter">Meter</option>
                        <option value="PCS">PCS</option>
                        <option value="Bungkus">Bungkus</option>
                  </select>
                  </td>
                  <td>
                    <span href="#" class="btn btn-outline-danger form-control delete-row" onclick="(function(){
                      document.querySelectorAll('.delete-row').forEach(function(button) {
                          button.addEventListener('click', function() {
                            this.parentNode.parentNode.remove();
                          });
                      });
                    }())">Hapus</span>
                  </td>
                </tr>`
    document.getElementById('mytable').getElementsByTagName('tbody')[0].insertAdjacentHTML('beforeend', tr);
} 
</script>
<?= $this->endSection(); ?>
