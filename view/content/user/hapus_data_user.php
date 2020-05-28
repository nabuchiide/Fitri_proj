<?php 
    if (isset($_GET['id_user'])) {
        $id_user = $_GET['id_user'];
        $user->hapus($id_user);
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=user_akun'>";
    }else {
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=user_akun'>";
    }
    ?>