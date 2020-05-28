<?php 
    if (isset($_GET['id_suplier'])) {
        $id_suplier = $_GET['id_suplier'];
        $suplier->hapus($id_suplier);
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=suplayer'>";
    }else {
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=suplayer'>";
    }
    ?>