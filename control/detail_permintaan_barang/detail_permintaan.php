<?php 
    class detail_permintaan{

        public function simpan($nama_barang, $harga_transaksi, $id_order, $jumlah){
            $koneksi = new koneksi;
                $query = mysqli_query($koneksi->conn,"INSERT INTO `detail_order`(`nama_barang`, `harga_transaksi`, `id_order`, `jumlah`) VALUES ('$nama_barang','$harga_transaksi','$id_order', $jumlah)");
                if ($query) {
                    // echo "<div class='alert alert-success'><span class='fa fa-check'> Data transaksi berhasil disimpan</span></div>";
            }
        }
        public function edit($detail_cart_id, $nama_barang, $harga_transaksi, $id_order, $jumlah){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `detail_order` SET `detail_cart_id`='$detail_cart_id',`nama_barang`='$nama_barang',`harga_transaksi`='$harga_transaksi', `id_order`= '$id_order', `jumlah` = '$jumlah' WHERE `detail_order`='$detail_cart_id'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
            }
        }
        public function edt_jml($detail_cart_id, $jumlah){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `detail_order` SET `jumlah`= $jumlah WHERE `detail_cart_id` = $detail_cart_id");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
            }
        }
        public function hapus($detail_cart_id){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"DELETE FROM `detail_order` WHERE `detail_cart_id` = $detail_cart_id");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil dihapus</div>";
            }
        }
        public function detail($detail_cart_id){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `id_order` = $detail_cart_id");
            $row = $query->fetch_assoc();
            
            $this->id_transaksi_detail = $row['detail_cart_id'];
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
        public function tampil_detail_order($detail_cart_id){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `detail_cart_id` = $detail_cart_id");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function edit_jumlah_ret($detail_cart_id,  $jumlah){
            $koneksi = new koneksi;
            $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `detail_cart_id`= '$detail_cart_id'");
            while ($row = mysqli_fetch_array($query0)) {  $jumlah_awal = $row['jumlah'];}
            $update_jumlah = $jumlah_awal - $jumlah;
            $query = mysqli_query($koneksi->conn, "UPDATE `detail_order` SET `jumlah`= '$update_jumlah' WHERE `detail_cart_id`= '$detail_cart_id'");
        }
    }
    ?>