<?php 

    if (isset($_GET['id_barang'])) {
        $id_barang = $_GET['id_barang'];
        $barang->hapus_barang($id_barang);
    }elseif (isset($_GET['sat_br'])) {
        $id_satuan_barang =$_GET['sat_br'];
        $satuan_barang->hapus($id_satuan_barang);
    }elseif (isset($_GET['jns_br'])) {
        $id_jenis_barang =$_GET['jns_br'];
        $jenis_barang->hapus($id_jenis_barang);
    }
?>
   <meta http-equiv="refresh" content="2;url=index.php?p=data_barang">