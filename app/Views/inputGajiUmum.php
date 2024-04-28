<?= $this->extend("template");?>

<?= $this->section("content");?>
<?= $this->include("sidebar");?>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Form Input Gaji Karyawan Umum</h5>
              <div class="card">
                <div class="card-body">
                  <form action="input_gaji_umum" method="post">
                    <div class="mb-3">
                      
                    <?php $kode = null;
                        if(empty($kode_gaji['kode_gaji'])) {
                          $kode = 0;
                        }else{
                          $kode = $kode_gaji['kode_gaji'];  
                        }
                        
                        if($kode+1 < 10){
                          $nol = '00';
                        }elseif($kode+1 >= 10 && $kode+1 < 100) {
                          $nol = '0';
                        }else{
                          $nol = '';
                        }

                        ?>

                      <label for="exampleInputEmail1" class="form-label">Kode Gaji</label>
                      <input name="kode_gaji" value="G-<?=
                        $bulan.'-'.$nol.$kode+1;
                      ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">ID Karyawan</label>
                      <select name="kode_karyawan" type="text" class="form-control" id="karyawan" aria-describedby="emailHelp">
                        <option selected>-- Pilih Karyawan --</option>
                        <?php foreach($gaji as $g) : ?>
                          <option id="id_karyawan" value="<?= $g['kode']?>"><?= $g['kode']?> - - <?= $g['nama']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah Presensi</label>
                      <input id="jumlah" value="" name="jumlah_absensi" onkeyup="(function(data, v){
                        document.getElementById('total_gaji').value = v.value*data
                      })(<?= $gaji[1]['gaji']; ?>, this)" type="number" class="form-control" id="jumlah">
                    </div>
                    <div class="mb-5">
                      <label for="total_gaji" class="form-label">Total Gaji</label>
                      <input name="total_gaji" type="number" class="form-control" readonly id="total_gaji">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <script>
            $(document).ready(function () {
                function cariAbsen(searchTerm) {
                    $.ajax({
                        type: 'POST',
                        url: '/cari_absen',
                        data: { search: searchTerm },
                        dataType: 'json',
                        success: function (data) {
                            // $('#tableSiswa').html(data);
                            $('#jumlah').val(data.absen[0].absen)
                            console.log(data.absen[0].absen);
                            $('#total_gaji').val(data.absen[0].absen * <?= $gaji[1]['gaji']; ?>);
                        }
                    });
                }

                $('#karyawan').on('change', function () {
                  var searchTerm = $(this).val();
                  // console.log(searchTerm);
                    cariAbsen(searchTerm); 
                });
            });
        </script>

<?= $this->endSection();?>