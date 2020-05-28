
<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    require_once "../control/koneksi.php";
    require_once "../control/loader.php";
    
    include_once 'head.php';
    $koneksi = new koneksi();

    if ($_SESSION['login']==0) {
      header("location:login.php");
    }
    $_GET['p'] = isset($_GET['p']) ? $_GET['p'] : false;
?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php
    if ($_SESSION['level'] == 'Kepala Gudang') {
      include "sidebar/sidebar_kepala_gudang.php";
    } elseif ($_SESSION['level'] == 'Admin') {
      include "sidebar/sidebar_admin.php";
    }elseif ($_SESSION['level'] == 'Keuangan') {
      include "sidebar/sidebar_accounting.php";
    }elseif ($_SESSION['level'] == 'Master'){
      include "sidebar/sidebar.php";
    }else {
      header("location:login.php");
    }
      ?>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <?php 
              include "topbar.php"
            ?>
          <!-- Main Content -->
            <div class="cotainer-fluid">
            <?php 
            // echo "<pre>";
            // print_r($_SESSION);
            // echo "</pre>";
              $loader = new loader('p');
              ?>
            </div>
          <!-- End of Main Content -->
        </div>
      <!-- Footer -->
      <?php 
        include "footer.php";
        ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>