<?php 
     class retur_detail{
        public function simpan($nama_barang, $harga_transaksi, $id_retur, $jumlah){
            $koneksi = new koneksi;
                $query = mysqli_query($koneksi->conn,"INSERT INTO `detail_retur`(`nama_barang`, `harga_transaksi`, `id_retur`, `jumlah`) VALUES ('$nama_barang', '$harga_transaksi', '$id_retur', '$jumlah')");
        }
        public function tampil_retur($id_retur){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_retur` WHERE `id_retur` = '$id_retur'");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
    }
    ?>