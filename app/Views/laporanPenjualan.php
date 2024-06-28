<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PENJUALAN BATIK ILHAM</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>
        <center>LAPORAN PENJUALAN BATIK ILHAM</center>
    </h1>
    <H4>
        <center>TANGGAL <?= $tanggal ?></center>
    </H4>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kode penjualan</th>
                    <th scope="col">Nama pakaian</th>
                    <th scope="col">Terjual</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kode pelanggan</th>
                    <th scope="col">Jenis pengiriman</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $p) : ?>
                    <tr>
                        <th scope="row"><?= $p['tanggal'] ?></th>
                        <td><?= $p['kode_penjualan'] ?></td>
                        <td><?= $p['nama_pakaian'] ?></td>
                        <td><?= $p['qty'] ?></td>
                        <td><?= $p['harga'] ?></td>
                        <td><?= $p['kode_pelanggan'] ?></td>
                        <td><?= $p['jenis_pengiriman'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
</body>

</html>