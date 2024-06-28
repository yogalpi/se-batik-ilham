<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Absensi Karyawan Umum</h5>
              <div class="card">
                <div class="card-body">
                <?php if(session()->getFlashdata('sukses')):?>
                    <div onclick="(function(notif){
                      notif.style.display = 'none';
                      })(this)" id="notif" class="alert alert-success" role="alert">
                      <?= session()->getFlashdata('sukses')?>
                    </div>
                <?php elseif(session()->getFlashdata('gagal')):?>
                    <div onclick="(function(notif){
                        notif.style.display = 'none';
                        })(this)" id="notif" class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagal')?>
                      </div>
                <?php endif; ?>
                  <form action="input_absensi" method="post">  

                  <input name="tanggal" type="date" class="form-control" id="tanggal" style="display: none;">

                    <div class="table-responsive mb-5">
                      <table class="table">
                        <tr>
                          <th>KODE KARYAWAN</th>
                          <th>NAMA KARYAWAN</th>
                          <th>STATUS KEHADIRAN</th>
                        </tr>

                        <?php foreach($data as $g) : ?>
                          <tr>
                            <td>
                              <div class="m-1">
                                  <input name="kode_karyawan[]" readonly value="<?= $g['kode']?>" type="text" class="form-control" id="kode">
                              </div>
                            </td>
                            <td>
                              <div class="m-1">
                                  <input name="nama[]" type="text" readonly value="<?= $g['nama']?>" class="form-control" id="nama">
                              </div>
                            </td>
                            <td>
                            <div class="m-1">
                                <select name="status[]" type="text" class="form-control border-secondary" id="karyawan" aria-describedby="emailHelp">
                                  <option value="HADIR" selected>HADIR</option>
                                <option value="TIDAK MASUK">TIDAK MASUK</option>
                              </select>
                            </div>
                            </td>
                          </tr>

                          <?php endforeach; ?>

                        </table>
                      </div>

                        
                        <button id="button" type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
          </div>
        </div>
        <script>
          window.onload = (function loadDate() {
              let date = new Date(),
                  day = date.getDate(),
                  month = date.getMonth() + 1,
                  year = date.getFullYear();

              if (month < 10) month = "0" + month;
              if (day < 10) day = "0" + day;

              const todayDate = `${year}-${month}-${day}`;

              document.getElementById("tanggal").defaultValue = todayDate;
          })();
        </script>

<?= $this->endSection();?>