  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=dashboard">
          <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <i class="fas fa-shopping-basket"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Pembelian</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
          <a class="nav-link" href="index.php?page=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="">Dashboard</span>
          </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Data Master
        </div>

        <li class="nav-item ">
          <a class="nav-link" href="index.php?p=user_akun">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="index.php?p=suplayer">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Data Suplier</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#barang" aria-expanded="true" aria-controls="navtransaksi">
            <i class="fas a-fw fa-box"></i>
            <span class>Barang</span>
          </a>
          <div id="barang" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Data Transaksi</h6> -->
              <a class="collapse-item" href="index.php?p=data_barang">Data Barang</a>
              <a class="collapse-item" href="index.php?p=katalog">Data Katalog</a>
            </div>
          </div>
        </li>

        
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->


        <div class="sidebar-heading">
        Fitur
        </div>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navpermintaanbarang" aria-expanded="true" aria-controls="navpermintaanbarang">
            <!-- <i class="fas fa-fw fa-money-check-alt"></i> -->
            <i class="fas fa-fw fa-indent"></i>
            <span class>Pembelian Barang</span>
          </a>
          <div id="navpermintaanbarang" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="index.php?p=verifikasi_p">Data Pembelian Barang</a>
              <a class="collapse-item" href="index.php?p=list_pembelian">Laporan Pembelian Barang</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navretur" aria-expanded="true" aria-controls="navpermintaanbarang">
            <!-- <i class="fas fa-fw fa-money-check-alt"></i> -->
            <i class="fas fa-fw fa-random"></i>
            <span class>Retur Pembelian</span>
          </a>
          <div id="navretur" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="index.php?p=data_retur">Lihat Data Retur Pembelian</a>
              <a class="collapse-item" href="index.php?p=list_retur">Laporan Retur Pembelian</a>
            </div>
          </div>
        </li>

        <div class="sidebar-heading">
        Dokumentasi
        </div>

        <li class="nav-item ">
          <a class="nav-link" href="index.php?p=list_transaksi"">
            <i class="fas fa-fw fa-bars"></i>
            <span>Lihat Daftar Transaksi</span>
          </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php" >
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span class="text">Logout</span>
          </a>
        </li>

  </ul>
