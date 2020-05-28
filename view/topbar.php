<div id="content">
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <ul class="navbar-nav ml-auto">
    </li>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-calendar-alt fa-fw"></i>  
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          <?php 
                $Today=date('y:m:d');
                $new=date('l, F d, Y',strtotime($Today));
                echo $new."<br>";
              ?>
        </span>
      </a>
    </li>
    
    <div class="topbar-divider d-none d-sm-block"></div>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>  
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_user'] ?></span>
      </a>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->

<!-- /.container-fluid -->

</div>