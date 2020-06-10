<?php 
    
    class retur{
        // $id_retur, $status, $total_transaksi, $tanggal, $id_order
        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT max(`id_retur`) FROM `retur`");
            $row = mysqli_fetch_array($query);
            if ($row) {
                $nilai_Id = substr($row[0], 3);
                $id_ret = (int) $nilai_Id;
                $id_ret = $id_ret + 1;
                $id_ret_otomatis = "RET" .str_pad($id_ret, 3, "0", STR_PAD_LEFT);
            }else{
                $id_ret_otomatis = "RET001"; 
            }
            return $id_ret_otomatis;
        }
        public function simpan($id_retur, $status, $total_transaksi, $tanggal, $id_order){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"INSERT INTO `retur`(`id_retur`, `status`, `total_transaksi`, `tanggal`, `id_order`) VALUES ('$id_retur', '$status', '$total_transaksi', '$tanggal', '$id_order')");
        }
        public function tampil_detail_retur(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT `retur`.`id_retur`, `status`, `total_transaksi`, `tanggal`, `id_order`, `detail_ret_id`, `nama_barang`, `harga_transaksi`, `detail_retur`.`id_retur`, `jumlah`FROM `retur` join `detail_retur` on `retur`.`id_retur` = `detail_retur`.`id_retur`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function tampil_join_order(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT id_retur, `retur`.`status`, `retur`.`total_transaksi`, `retur`.`tanggal`, `order`.`nama_suplier`, `retur`.`id_order` FROM `retur` join `order` on `retur`.`id_order` = `order`.`id_order`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function edit($id_retur, $status, $total_transaksi, $tanggal, $id_order){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `retur` SET `status`='$status',`total_transaksi`='$total_transaksi',`tanggal`='$tanggal',`id_order`='$id_order' WHERE `id_retur`='$id_retur'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
            }
        }
        public function tampil(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `retur`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function detail($id_retur){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `retur` WHERE `id_retur`= '$id_retur'");
            $row = mysqli_fetch_array($query);
            
            $this->id_retur = $row['id_retur'];
            $this->id_order = $row['id_order'];
            $this->tanggal = $row['tanggal'];
            $this->status = $row['status'];
            $this->total_transaksi = $row['total_transaksi'];
        }
    }
    ?>