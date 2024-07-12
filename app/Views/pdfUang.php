<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1 class="text-center">LAPORAN KEUANGAN BATIK ILHAM</h1>
    <h3>Nama Admin : <?= session()->get("user")[0]["nama"] ?></h3>
    <h3>
        <?php

            // set  waktu
            date_default_timezone_set('Asia/Jakarta');

            // mengambil format jam
            $currentDate = date('d-m-Y');

            echo "Tanggal : $currentDate";
        ?>
    </h3>
    <h2>LAPORAN KEUANGAN</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">KODE</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">STATUS</th>
                <th scope="col">JUMLAH</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">KODE PENGGUNA</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($uangMasukdanKeluar as $uang):?>
                            <tr>
                            <td scope="row"><?php echo($uang['kode'])?></td>
                            <td scope="row"><?php echo($uang['tanggal'])?></td>
                            <td scope="row"><?php echo($uang['status'])?></td>
                            <td scope="row"><?php echo($uang['jumlah'])?></td>
                            <td scope="row"><?php echo($uang['keterangan'])?></td>
                            <td scope="row"><?php echo($uang['kode_pengguna'])?></td>
                            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </body>
</html>
