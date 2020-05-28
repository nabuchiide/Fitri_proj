<?php 
    // $id_pembayaran, $id_order, $tempo, $status
    class pembayaran{
        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT max(`id_pembayaran`) FROM `pembayaran`");
            $row = mysqli_fetch_array($query);
            if ($row) {
                $nilai_Id = substr($row[0], 3);
                $id_pembayaran = (int) $nilai_Id;
                $id_pembayaran =  $id_pembayaran + 1;
                $id_pembayaran_otomatis = "PEM" .str_pad($id_pembayaran, 3, "0", STR_PAD_LEFT);
            }else{
                $id_pembayaran_otomatis = "PEM001"; 
            }
            return $id_pembayaran_otomatis;
        }
        public function simpan($id_pembayaran, $id_order, $tempo, $status){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn,"SELECT * FROM `pembayaran` WHERE `id_order` = '$id_order'");
            if (mysqli_num_rows($cek)== 0) {
                $query = mysqli_query($koneksi->conn,"INSERT INTO `pembayaran`(`id_pembayaran`, `id_order`, `tempo`, `status`) VALUES ('$id_pembayaran', '$id_order', $tempo, '$status')");
                if ($query) {
                    echo "<div class='alert alert-success'><span class='fa fa-check'> Data Pembayaran berhasil disimpan </span></div>";
                }
            }else {
                echo "<div class='alert alert-danger'><span class='fa fa-cros'> Data Pembayaran Sudah ada </span></div>";
            }
        }
        public function edit($id_pembayaran, $id_order, $tempo, $status){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `pembayaran` SET `id_order`='$id_order',`tempo`=$tempo,`status`='$status' WHERE 1");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
            }
        }
        public function hapus($id_pembayaran){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"DELETE FROM `pembayaran` WHERE `id_pembayaran`= '$id_pembayaran'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil dihapus</div>";
            }
        }
        public function edit_status($id_pembayaran, $status){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `pembayaran` SET `status`='$status' WHERE `id_pembayaran`= '$id_pembayaran'");
            if ($query) {
                // echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil diperbarui</div>";
            }
        }
        public function detail($id_pembayaran){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `pembayaran` WHERE `id_pembayaran`= '$id_pembayaran'");
            $row = $query->fetch_assoc();
            // $row = mysqli_fetch_array($query);
            
            $this->id_order = $row['id_order'];
            $this->id_pembayaran = $row['id_pembayaran'];
            $this->temp = $row['tempo'];
            $this->status = $row['status'];

        }
    }

    // class hutang{
    //     public function tampil(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT `id_pembayaran`,`tanggal`,`tanggal_penerimaan`, `tanggal_pelunasan`, `tanggal_pembelian`, `no_surat_jalan`, `nama_suplier`, `order`.`status`, `pembayaran`.`status`,`total_transaksi`, `tempo` as `akhir pembayaran` from `pembayaran` join `order` on `pembayaran`.`id_order` = `order`.`id_order`");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }

    //     public function simpan($nama_suplier, $total_hutang){
    //         $koneksi = new koneksi;
    //         $cek = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` WHERE `nama_suplier` = '$nama_suplier'");
    //         if (mysqli_num_rows($cek)== 0) {
    //             $query = mysqli_query($koneksi->conn,"INSERT INTO `hutang`(`nama_suplier`, `total_hutang`) VALUES ('$nama_suplier', '$total_hutang')");
    //         }
    //     }

    //     public function tampil_per_suplier(){
    //         $koneksi = new koneksi;
    //         // $query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` join `order` on `order`.`nama_suplier` = `hutang`.`nama_suplier` join `pembayaran` on `pembayaran`.`id_order` = `order`.`id_order`");
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` join `suplier` on `suplier`.`nama_suplier` = `hutang`.`nama_suplier` WHERE `total_hutang`>0");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }

    //     public function tambah_hutang($nama_suplier, $total_hutang){
    //         $koneksi = new koneksi;
    //         $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` WHERE `nama_suplier` = '$nama_suplier'");
    //         while ($row = mysqli_fetch_array($query0)) {  $jumlah_sekarang = $row['total_hutang'];}
    //         $update_jumlah = $jumlah_sekarang + $total_hutang;
    //         $query = mysqli_query($koneksi->conn, "UPDATE `hutang` SET `total_hutang`='$update_jumlah' WHERE `nama_suplier` = '$nama_suplier'");
      
    //     }

    //     public function kurang_hutang($nama_suplier, $total_hutang){
    //         $koneksi = new koneksi;
    //         $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` WHERE `nama_suplier` = '$nama_suplier'");
    //         while ($row = mysqli_fetch_array($query0)) {  $jumlah_sekarang = $row['total_hutang'];}
    //         $update_jumlah = $jumlah_sekarang - $total_hutang;
    //         $query = mysqli_query($koneksi->conn, "UPDATE `hutang` SET `total_hutang`='$update_jumlah' WHERE `nama_suplier` = '$nama_suplier'");
      
    //     }

    //     public function show(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang`");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    // }
    ?>
