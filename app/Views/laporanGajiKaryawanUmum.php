<center><h3>LAPORAN PENGGAJIAN KARYAWAN UMUM</h3>
<h4>BATIK ILHAM<br>-- Human Resource Departemen -- </h4>
<p><?= $tanggal; ?></p></center>
<table border="1px" cellspacing="0" cellpadding="13" align="center">
    <tr text-align="center">
        <th>KODE GAJI</th>
        <th>KARYAWAN</th>
        <th>JUMLAH PRESENSI</th>
        <th>TOTAL GAJI</th>
    </tr>
    <?php foreach ($absen as $d) :?>
    <tr>
        <td align="center"><?= $d['kode_gaji']?></td>
        <td><?=$d['kode'].' -- '.$d['nama']?></td>
        <td align="center"><?= $d['jumlah_absensi']?></td>
        <td align="center"><?= $d['total_gaji']?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3">JUMLAH TOTAL GAJI</td>
        <td align="center">Rp. <strong><?= $total[0]['total_gaji']?></strong></td>
    </tr>
</table>