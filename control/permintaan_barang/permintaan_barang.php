<?php 
     class permintaan_barang{

        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT max(`id_order`) FROM `order`");
            $row = mysqli_fetch_array($query);
            if ($row) {
                $nilai_Id = substr($row[0], 3);
                $id_order = (int) $nilai_Id;
                $id_order = $id_order + 1;
                $id_order_otomatis = "REQ" .str_pad($id_order, 3, "0", STR_PAD_LEFT);
            }else{
                $id_order_otomatis = "REQ001"; 
            }
            return $id_order_otomatis;
        }
        public function simpan($id_order, $tanggal, $total_transaksi, $nama_suplier, $status){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn,"SELECT * FROM `order` WHERE `id_order`= '$id_order'");
            if (mysqli_num_rows($cek)== 0) {
                $query = mysqli_query($koneksi->conn,"INSERT INTO `order`(`id_order`, `tanggal`, `total_transaksi`, `nama_suplier`, `status`) VALUES ('$id_order','$tanggal', '$total_transaksi','$nama_suplier','$status')");
                if ($query) {
                    // echo "<div class='alert alert-success'><span class='fa fa-check'> Data transaksi berhasil disimpan </span></div>";
                }
            }
        }
        public function edit($id_order, $tanggal, $total_transaksi, $nama_suplier){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal`='$tanggal',`total_transaksi`='$total_transaksi',`nama_suplier`=' $nama_suplier' WHERE `id_order`= '$id_order'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
            }
        }
        public function hapus($id_order){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"DELETE FROM `order` WHERE `id_order`= '$id_order'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil dihapus</div>";
            }
        }
        public function detail($id_order){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` WHERE `id_order`= '$id_order'");
            $row = mysqli_fetch_array($query);
            
            $this->id_order = $row['id_order'];
            $this->tanggal = $row['tanggal'];
            $this->status = $row['status'];
            $this->total_transaksi = $row['total_transaksi'];
            $this->nama_suplier = $row['nama_suplier'];
            $this->tanggal_penerimaan = $row['tanggal_penerimaan'];
            $this->tanggal_pembelian = $row['tanggal_pembelian'];
            $this->no_surat_jalan = $row['no_surat_jalan'];
            $this->no_faktur = $row['nomor_faktur'];
            $this->tanggal_pelunasan = $row['tanggal_pelunasan'];
        }
        public function tampil_detail_transaksi(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` join `detail_order` on  `order`.`id_order` = `detail_order`.`id_order`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function tampil(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `order`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function di_beli($id_order, $status){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `status`='$status' WHERE `id_order`= '$id_order'");
            if ($query) {
                // echo "<div class='alert alert-success'><span class='fa fa-check'></span>Data telah di setujui</div>";
            }
        }
        public function tampil_status($status, $status1){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`='$status' OR `status`='$status1'");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function edit_total_transaksi($id_order, $total_transaksi){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `total_transaksi`= $total_transaksi WHERE `id_order`= '$id_order'");
            if ($query) {
                // echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil diperbarui</div>";
            }
        }
        public function edit_total_transaksi_retur($id_order, $total_transaksi){
            $koneksi = new koneksi;
            $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `order` WHERE `id_order`= '$id_order'");
            while ($row = mysqli_fetch_array($query0)) {  $total_transaksi_sekarang = $row['total_transaksi'];}
            $update_total_transaksi = $total_transaksi_sekarang - $total_transaksi;
            $query = mysqli_query($koneksi->conn, "UPDATE `order` SET `total_transaksi`= '$update_total_transaksi' WHERE `id_order`= '$id_order'");
        }
        public function edit_penerimaan_barang($id_order, $tanggal_penerimaan, $no_surat_jalan, $nomor_faktur){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal_penerimaan`=' $tanggal_penerimaan', `no_surat_jalan` = '$no_surat_jalan', `nomor_faktur` = '$nomor_faktur' WHERE `id_order`= '$id_order'");
        }
        public function edit_tanggal_pembelian_barang($id_order, $tanggal_pembelian){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal_pembelian` = '$tanggal_pembelian' WHERE `id_order`= '$id_order'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span>Data telah di setujui</div>";
            }
        }
        public function edit_tanggal_pelunasan($id_order, $tanggal_pelunasan){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal_pelunasan` = '$tanggal_pelunasan' WHERE `id_order`= '$id_order'");
        }
        public function tampil_selain($status){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`<>'$status'");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function tampil_selain2($status, $status1){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`<>'$status' AND `status`<>'$status1'");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
    }
    ?>