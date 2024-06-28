<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>
<div class="container-fluid">
    <form action="<?= site_url("/pre_sale") ?>" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-2">
                        <label for="kode_penjualan" class="form-label">Kode penjualan</label>
                        <input type="text" id="kode_penjualan" class="form-control" name="kode_penjualan" value="PEN-<?= sprintf("%03d", $no_urut + 1) ?>" required>
                    </div>
                    <div class="col-4">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" id="tanggal" class="form-control" name="tanggal" value="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="col">
                        <?php
                        $total = 0;
                        foreach ($pre_sale as $p) {
                            $total += ($p['qty'] * $p['harga']);
                        }
                        ?>
                        <label for="Total" class="form-label">Total</label>
                        <input type="text" id="total" class="form-control" name="total" value="Rp. <?= number_format($total, 0, ",", "."); ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <label for="items" class="form-label">Barang</label>
                        <select name="items" class="form-select" id="items" required>
                            <option selected disabled>Pilih barang</option>
                            <?php foreach ($barang as $b) : ?>
                                <?php if ($b['jumlah'] != 0) : ?>
                                    <option value="<?= $b['kode'] ?>#<?= $b['ukuran'] ?>"><?= $b['nama_pakaian'] ?> - <?= $b['ukuran'] ?> [Stok : <?= $b['jumlah'] ?>]</option>
                                <?php else : ?>
                                    <option disabled><?= $b['nama_pakaian'] ?> - <?= $b['ukuran'] ?> | Stok : <?= $b['jumlah'] ?> [Habis]</option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="qty" class="form-label">Jumlah</label>
                        <input type="number" name="qty" class="form-control" id="qty">
                    </div>
                    <div class="col-2">
                        <label for="qty" class="form-label">Aksi</label>
                        <input type="submit" class="form-control btn btn-primary" value="Tambah" id="qty">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Ukuran</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Sub-Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pre_sale as $p) : ?>
                        <tr class="align-middle">
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $p['barang'] ?></td>
                            <td><?= $p['ukuran'] ?></td>
                            <td><?= $p['qty'] ?></td>
                            <td><?= $p['harga'] ?></td>
                            <td><?= $p['qty'] * $p['harga'] ?></td>
                            <td>
                                <a href="<?= site_url("/delete_item/" . $p['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <form action="/simpan_transaksi" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label for="bayar" class="form-label">Bayar</label>
                        <input type="text" class="form-control" name="bayar" id="bayar">
                    </div>
                    <div class="col-5">
                        <label for="bayar" class="form-label">Kembalian</label>
                        <input type="text" class="form-control" name="bayar" id="kembalian" readonly value="Rp. 0">
                    </div>
                    <div class="col-2">
                        <label for="bayar" class="form-label">Aksi</label>
                        <button type="submit" class="btn btn-primary form-control">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    const inputBayar = document.getElementById('bayar')
    
    inputBayar.addEventListener('keydown', function(evt) {
        if(evt.keyCode == 13){
            evt.preventDefault()
        }
    })

    inputBayar.addEventListener('input', function() {
        const total = document.getElementById('total').value
        const bayar = document.getElementById('bayar').value
        const kembalian = document.getElementById('kembalian')

        let numbersTotal = total.replace(/\D/g, '');
        let numbersBayar = bayar.replace(/\D/g, '');

        kembalian.value = formatRupiah("0", 'Rp. ');
        this.value = formatRupiah(this.value, 'Rp. ');

        if (parseInt(numbersBayar) - parseInt(numbersTotal) > 0) {
            let hasil = (parseInt(numbersBayar) - parseInt(numbersTotal)).toString()
            kembalian.value = formatRupiah(hasil, 'Rp. ')
        }

    })
</script>

<?= $this->endSection(); ?>