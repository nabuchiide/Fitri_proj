<?php 
// $id_barang = $_GET['id_barang'];
// $katalog->detail($id_barang);

    if (isset($_GET['id_barang'])) {
        $id_barang = $_GET['id_barang'];
        $katalog->hapus($id_barang);
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=katalog'>";
    }else {
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=katalog'>";
    }
    ?>