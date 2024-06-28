<?= $this->renderSection("content"); ?>

<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/" class="text-nowrap logo-img">
            <!-- LOGO -->
            <img src="<?php base_url();?>/assets/images/logos/logo.jpg" width="180" alt="" srcset="">
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">

        <?php if(session()->get("user")[0]["kode_akses"] == "AGBB" || session()->get("user")[0]["kode_akses"] ==  "OWN") :?> 

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">PENGADAAN</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/input_pengadaan" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-square-plus"></i>
                </span>
                <span class="hide-menu">Tambah Data</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/data_permintaan" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-hand-point-up"></i>
                </span>
                <span class="hide-menu">Permintaan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/data_pengadaan" aria-expanded="false">
                <span>
                <i class="fa-solid fa-list-ul"></i>
                </span>
                <span class="hide-menu">Daftar Data</span>
              </a>
            </li>

            <?php endif?>

            <?php if(session()->get("user")[0]["kode_akses"] == "KP" || session()->get("user")[0]["kode_akses"] ==  "OWN" ) :?> 

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Produksi</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/input_produksi" aria-expanded="false">
                <span>
                <i class="fa-solid fa-square-plus"></i>
                </span>
                <span class="hide-menu">Tambah Data</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/data_produksi" aria-expanded="false">
                <span>
                <i class="fa-solid fa-list-ul"></i>
                </span>
                <span class="hide-menu">Daftar Data</span>
              </a>
            </li>

            <?php endif?>

            <!-- Managemen aset -->
            <?php if(session()->get("user")[0]["kode_akses"] == "AMA" || session()->get("user")[0]["kode_akses"] ==  "OWN" ) :?> 

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Manajemen Aset</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/manajemen_aset'){echo "active";} ?>" href="/manajemen_aset" aria-expanded="false">
                <span>
                <i class="fa-solid fa-plus"></i>
                </span>
                <span class="hide-menu">Tambah Data</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/daftar_aset'){echo "active";} ?>" href="/daftar_aset" aria-expanded="false">
                <span>
                <i class="fa-solid fa-list-ul"></i>
                </span>
                <span class="hide-menu">Daftar Data Aset</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/pemeliharaan_aset'){echo "active";} ?>" href="/pemeliharaan_aset" aria-expanded="false">
                <span>
                <i class="fa-solid fa-file-invoice-dollar"></i>
                </span>
                <span class="hide-menu">Biaya Pemeliharaan Aset</span>
              </a>
            </li>

            <?php endif?>
            <!-- end Managemen aset -->

            <?php if(session()->get("user")[0]["kode_akses"] == "KE" || session()->get("user")[0]["kode_akses"] ==  "OWN" ) :?> 

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Keuangan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/uangMasukdanKeluar" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Uang Masuk Dan Keluar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/buku_besar" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Buku Besar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/datauangMasukdanKeluar" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Data Uang Masuk dan Keluar</span>
              </a>
            </li>

            <?php endif?>

            <?php if(session()->get("user")[0]["kode_akses"] == "HRD" || session()->get("user")[0]["kode_akses"] ==  "OWN" ) :?> 

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Kepegawaian</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/manajemen_pegawai'){echo "active";} ?>" href="/manajemen_pegawai" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-plus"></i>
                </span>
                <span class="hide-menu">Tambah Data</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/absensi_pegawai'){echo "active";} ?>" href="/absensi_pegawai" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-clipboard-user"></i>
                </span>
                <span class="hide-menu">Absensi Pegawai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/daftar_absensi'){echo "active";} ?>" href="/daftar_absensi" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-list-ul"></i>
                </span>
                <span class="hide-menu">Daftar Data Absensi</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/daftar_pegawai'){echo "active";} ?>" href="/daftar_pegawai" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-user-group"></i>
                </span>
                <span class="hide-menu">Daftar Data Pegawai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php if ($_SERVER['REQUEST_URI'] == '/manajemen_gaji' || $_SERVER['REQUEST_URI'] == '/gaji_produksi' || $_SERVER['REQUEST_URI'] == '/gaji_umum'){echo "active";} ?>" href="/manajemen_gaji" aria-expanded="false">
                <span>
                <i class="fa-solid fa-hand-holding-dollar"></i>
                </span>
                <span class="hide-menu">Kelola Gaji</span>
              </a>
            </li>

            <?php endif?>

            <?php if(session()->get("user")[0]["kode_akses"] == "AOS" || session()->get("user")[0]["kode_akses"] ==  "OWN"  ) :?> 

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Penjualan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/transaksi_penjualan" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Transaksi</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/invoice" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Invoice</span>
              </a>
            </li>

            <?php endif?>

            <?php if(session()->get("user")[0]["kode_akses"] == "AGBB" || session()->get("user")[0]["kode_akses"] ==  "OWN" ) :?> 

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Gudang Bahan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/input_gudang" aria-expanded="false">
                <span>
                <i class="fa-solid fa-square-plus"></i>
                </span>
                <span class="hide-menu">Tambah Data</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/data_gudang" aria-expanded="false">
                <span>
                <i class="fa-solid fa-list-ul"></i>
                </span>
                <span class="hide-menu">Daftar Data</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/laporan_gudang" aria-expanded="false">
                <span>
                <i class="fa-solid fa-book-skull"></i>
                </span>
                <span class="hide-menu">Laporan Gudang</span>
              </a>
            </li>

            <?php endif?>

            <?php if(session()->get("user")[0]["kode_akses"] == "AGP" || session()->get("user")[0]["kode_akses"] ==  "OWN" ) :?> 

            <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Gudang Jadi</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/input_gudang_jadi" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Tambah Data Produk</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/data_gudang_jadi" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Daftar Data Produk</span>
          </a>
        </li>

        <?php endif?>

        <?php if(session()->get("user")[0]["kode_akses"] == "CUS" || session()->get("user")[0]["kode_akses"] ==  "OWN" ) :?> 
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">User</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/akun_pelanggan" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Akun Pelanggan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/customer_service" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Customer Service</span>
              </a>
            </li>
            <?php endif?>
            <?php if(session()->get("user")[0]["kode_akses"] == "KSR") :?> 
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Kasir</span>
              </li>
              <li class="sidebar-item">
              <a class="sidebar-link" href="/kasir" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Kasir</span>
              </a>
            </li>
              <li class="sidebar-item">
              <a class="sidebar-link" href="/laporan_kasir" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Laporan</span>
              </a>
            </li>
            <?php endif?>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>

    <div class="body-wrapper">
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <p class="btn btn-primary mt-3"><?= session()->get("user")[0]["nama"] ?></p>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="/login" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>