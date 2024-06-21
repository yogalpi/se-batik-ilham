<center><h3>LAPORAN PENGGAJIAN KARYAWAN PRODUKSI</h3>
<h4>BATIK ILHAM<br>-- Human Resource Departemen -- </h4>
<p><?= $tanggal; ?></p></center>
<table border="1px" cellspacing="0" cellpadding="13" align="center">
    <tr text-align="center">
        <th>KODE GAJI</th>
        <th>KARYAWAN</th>
        <th>JUMLAH PRODUKSI</th>
        <th>TOTAL GAJI</th>
    </tr>
    <?php foreach ($produksi as $p) :?>
    <tr>
        <td align="center"><?= $p['kode_gaji']?></td>
        <td><?=$p['kode'].' -- '.$p['nama']?></td>
        <td align="center"><?= $p['jumlah_produksi']?></td>
        <td align="center"><?= $p['total_gaji']?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3">JUMLAH TOTAL GAJI</td>
        <td align="center">Rp. <strong><?= $total[0]['total_gaji']?></strong></td>
    </tr>
</table>