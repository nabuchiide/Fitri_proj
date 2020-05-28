<?php 
    class detail_permintaan{

        public function simpan($nama_barang, $harga_transaksi, $id_order, $jumlah){
            $koneksi = new koneksi;
                $query = mysqli_query($koneksi->conn,"INSERT INTO `detail_order`(`nama_barang`, `harga_transaksi`, `id_order`, `jumlah`) VALUES ('$nama_barang','$harga_transaksi','$id_order', $jumlah)");
                if ($query) {
                    // echo "<div class='alert alert-success'><span class='fa fa-check'> Data transaksi berhasil disimpan</span></div>";
            }
        }
        public function edit($detil_cart_id, $nama_barang, $harga_transaksi, $id_order, $jumlah){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `detail_order` SET `detil_cart_id`='$detil_cart_id',`nama_barang`='$nama_barang',`harga_transaksi`='$harga_transaksi', `id_order`= '$id_order', `jumlah` = '$jumlah' WHERE `detail_order`='$detil_cart_id'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
            }
        }
        public function edt_jml($detil_cart_id, $jumlah){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `detail_order` SET `jumlah`= $jumlah WHERE `detil_cart_id` = $detil_cart_id");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
            }
        }
        public function hapus($detil_cart_id){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"DELETE FROM `detail_order` WHERE `detil_cart_id` = $detil_cart_id");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil dihapus</div>";
            }
        }
        public function detail($detil_cart_id){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `id_order` = $detil_cart_id");
            $row = $query->fetch_assoc();
            
            $this->id_transaksi_detail = $row['detil_cart_id'];
            $this->nama_barang = $row['nama_barang'];
            $this->harga_transaksi = $row['harga_transaksi'];
            $this->id_order = $row['id_order'];
        }
        public function tampil_order($id_order){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `id_order` = '$id_order'");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function tampil_detail_order($detil_cart_id){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `detil_cart_id` = $detil_cart_id");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function edit_jumlah_ret($detil_cart_id,  $jumlah){
            $koneksi = new koneksi;
            $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `detil_cart_id`= '$detil_cart_id'");
            while ($row = mysqli_fetch_array($query0)) {  $jumlah_awal = $row['jumlah'];}
            $update_jumlah = $jumlah_awal - $jumlah;
            $query = mysqli_query($koneksi->conn, "UPDATE `detail_order` SET `jumlah`= '$update_jumlah' WHERE `detil_cart_id`= '$detil_cart_id'");
        }
    }
    ?>