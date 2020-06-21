<?php
    require_once "../control/loader.php";
    require_once '../control/akun/user.php';
    include_once 'head.php';
    $user = new user();
    session_start();
    if (isset($_POST['login'])) {
      session_destroy();
      session_start();
      $id_user          = trim($_POST['Id_user']);
      $password         = trim(ucwords($_POST['password']));
      $_SESSION['login'] = false;
      $user ->login($id_user,$password);
        if (isset($_SESSION['login'])) {
          if ($_SESSION['login'] == 1) {
            echo "<script>
            alert('Anda Berhasil Login!');
            document.location.href='index.php?page=dashboard';
            </script>";
          }else {
            echo "<script>
            alert('ID User atau Password salah!');
            document.location.href='login.php';
            </script>";
            session_destroy();
          }
        }
      }
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
?>
<!-- class="bg-gradient-success" -->
<body  style=" background: url('../atribut/img/back.jpg');">
  
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
    <div class="col-xl-5 col-lg col-md-10">
      

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                <!-- <div class="col-lg-1 d-none d-lg-block bg-login-image">
                  <img src="../atribut/img/harapan.png" alt="" srcset="">
                </div> -->
                <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="../atribut/img/harapan1.png" alt="" srcset="">
                    <h1 class="h4 text-gray-900 mb-4 font-weight">Sistem Informasi Pembelian Barang Dagang Secara Kredit</h1>
                  </div>
                  <hr>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user"  placeholder="Masukan ID anda..." name = "Id_user" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="password"  required>
                    </div>
                      <button type="submit" name="login" class="btn btn-success btn-user btn-block">
                          <span class="icon text-white-50">
                            <i class="fas fa-sign-in-alt"></i>
                            </span>
                          <span class="text"> Login</span>
                        </button>
                        <hr>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

    </div>
    </div>
</body>
