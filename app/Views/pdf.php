<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid mediumpurple;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: mediumpurple;
            color: white;
        }
    </style>
</head>

<body>
    <h1 class="text-center">LAPORAN BARANG BATIK ILHAM</h1>
    <h3>Nama Admin : <?= session()->get("user")[0]["nama"] ?></h3>
    <h3>
        <?php

            // set  waktu
            date_default_timezone_set('Asia/Jakarta');

            // mengambil format jam
            $currentDate = date('d-F-Y');

            echo "Tanggal : $currentDate";
        ?>
    </h3>
    <h2>Data Pembelian</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">KODE PENGADAAN</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">JUMLAH BARANG</th>
                <th scope="col">SATUAN</th>
                <th scope="col">HARGA</th>
                <th scope="col">TOTAL HARGA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengadaan as $peng): ?>
            <tr>
                  <td scope="row"><?= $peng["kode_pengadaan"] ?></td>
                  <td scope="row"><?= date_format(date_create($peng['tanggal']), "d F Y"); ?></td>
                  <td scope="row"><?= $peng["nama_barang"] ?></td>

                  <td scope="row"><?= $peng["jumlah_barang"] ?></td>
                  <td scope="row"><?= $peng["satuan"] ?></td>
                  <td scope="row">Rp.<?= number_format( $peng["harga"],0,'.','.') ?></td>
                  <td scope="row">Rp.<?= number_format( $peng["total_harga"],0,'.','.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Data Barang Keluar</h2>
    <table>
        <thead>
            <tr>
              <th scope="col">Nama Barang</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Satuan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detail_produksi as $dep): ?>
            <tr>
              <td scope="row"><?= $dep["nama_barang"] ?></td>
              <td scope="row"><?= $dep["jumlah_barang"] ?></td>
              <td scope="row"><?= $dep["satuan"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
