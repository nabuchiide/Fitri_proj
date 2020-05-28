<?php 
     class hutang{
        public function tampil(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT `id_pembayaran`, `pembayaran`.`id_order`,`tanggal`,`tanggal_penerimaan`, `tanggal_pelunasan`, `tanggal_pembelian`, `no_surat_jalan`, `nama_suplier`, `order`.`status`, `pembayaran`.`status`,`total_transaksi`, `tempo` as `akhir pembayaran`, `nomor_faktur`from `pembayaran` join `order` on `pembayaran`.`id_order` = `order`.`id_order`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }

        public function simpan($nama_suplier, $total_hutang){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` WHERE `nama_suplier` = '$nama_suplier'");
            if (mysqli_num_rows($cek)== 0) {
                $query = mysqli_query($koneksi->conn,"INSERT INTO `hutang`(`nama_suplier`, `total_hutang`) VALUES ('$nama_suplier', '$total_hutang')");
            }
        }

        public function tampil_per_suplier(){
            $koneksi = new koneksi;
            // $query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` join `order` on `order`.`nama_suplier` = `hutang`.`nama_suplier` join `pembayaran` on `pembayaran`.`id_order` = `order`.`id_order`");
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` join `suplier` on `suplier`.`nama_suplier` = `hutang`.`nama_suplier` WHERE `total_hutang`>0");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }

        public function tambah_hutang($nama_suplier, $total_hutang){
            $koneksi = new koneksi;
            $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` WHERE `nama_suplier` = '$nama_suplier'");
            while ($row = mysqli_fetch_array($query0)) {  $jumlah_sekarang = $row['total_hutang'];}
            $update_jumlah = $jumlah_sekarang + $total_hutang;
            $query = mysqli_query($koneksi->conn, "UPDATE `hutang` SET `total_hutang`='$update_jumlah' WHERE `nama_suplier` = '$nama_suplier'");
      
        }

        public function kurang_hutang($nama_suplier, $total_hutang){
            $koneksi = new koneksi;
            $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` WHERE `nama_suplier` = '$nama_suplier'");
            while ($row = mysqli_fetch_array($query0)) {  $jumlah_sekarang = $row['total_hutang'];}
            $update_jumlah = $jumlah_sekarang - $total_hutang;
            $query = mysqli_query($koneksi->conn, "UPDATE `hutang` SET `total_hutang`='$update_jumlah' WHERE `nama_suplier` = '$nama_suplier'");
      
        }

        public function tampil_keseluruhan(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
    }
    ?>