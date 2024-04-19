<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?= $this->include("sidebar"); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Transaksi</h5>
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">NOMOR TRANSAKSI</th>
                                <th scope="col">METODE</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">19 Januari 2024</th>
                                <td>TR-001</td>
                                <td>OFFLINE</td>
                                <td>400.000</td>
                                <td>
                                    <a href="/detail_transaksi/1" class="ms-3">
                                        <i class="bi bi-three-dots"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                            <path
                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>