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

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        Dokumentasi
        </div>

        <li class="nav-item ">
          <a class="nav-link" href="index.php?p=list_transaksi"">
            <i class="fas fa-fw fa-bars"></i>
            <span>Lihat Daftar Transaksi</span>
          </a>
        </li>

        <div class="sidebar-heading">
        Fitur
        </div>


        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navtrt" aria-expanded="true" aria-controls="navtransaksi">
            <i class="fas fa-fw fa-folder"></i>
            <span class>Pembayaran</span>
          </a>

          <div id="navtrt" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="index.php?p=data_pembayaran">Data Pembayaran</a>
              <a class="collapse-item" href="index.php?p=list_pembayaran">Laporan Pembayaran</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navtrtr" aria-expanded="true" aria-controls="navtransaksi">
            <i class="fas fa-fw fa-folder"></i>
            <span class>Pelunasan</span>
          </a>

          <div id="navtrtr" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="index.php?p=data_pelunasan">Data Pelunasan</a>
              <a class="collapse-item" href="index.php?p=list_hutang_per_sup">Laporan Hutang Dagang</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php" >
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span class="text">Logout</span>
          </a>
        </li>

  </ul>