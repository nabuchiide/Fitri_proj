<?php 
    class barang{
        
        public function tampil_barang_keseluruhan(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT id_barang, nama_barang, keterangan_jenis_barang, harga_barang, jumlah_barang, keterangan_satuan_barang FROM barang Join jenis_barang on barang.id_jenis_barang = jenis_barang.id_jenis_barang Join satuan_barang on barang.id_satuan_barang = satuan_barang.id_satuan_barang order by id_barang");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT max(`id_barang`) FROM `barang`");
            $row = mysqli_fetch_array($query);
            if ($row) {
                $nilai_Id = substr($row[0], 3);
                $id_barang = (int) $nilai_Id;
                $id_barang = $id_barang + 1;
                $id_barang_otomatis = "BRG" . str_pad($id_barang, 3, "0", STR_PAD_LEFT);
            } else {
                $id_barang_otomatis = "BRG001";
            }
            return $id_barang_otomatis;
        }
        public function simpan_barang($id_barang, $nama_barang, $id_jenis_barang, $harga_barang, $jumlah_barang, $id_satuan){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn, "SELECT * FROM `barang` WHERE `id_barang` = '$id_barang'");
            if (mysqli_num_rows($cek) == 0) {
                $query = mysqli_query($koneksi->conn,"INSERT INTO  `barang`(`id_barang`, `nama_barang`, `id_jenis_barang`, `harga_barang`, `jumlah_barang`, `id_satuan_barang`) VALUES ('$id_barang', '$nama_barang', '$id_jenis_barang', $harga_barang, $jumlah_barang, '$id_satuan')");
                if ($query) {
                   echo "<div class='alert alert-success'><span class='fa fa-check'> Data berhasil disimpan</span></div>";
                }
            }

        }
        public function hapus_barang($id_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "DELETE FROM `barang` WHERE `id_barang` = '$id_barang'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil dihapus</div>";
            }
        }
        public function edit_barang($id_barang, $nama_barang, $id_jenis_barang, $harga_barang, $jumlah_barang, $id_satuan){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "UPDATE `barang` SET `nama_barang`='$nama_barang',`id_jenis_barang`='$id_jenis_barang',`harga_barang`=$harga_barang,`jumlah_barang`=$jumlah_barang,`id_satuan_barang`='$id_satuan' WHERE `id_barang`='$id_barang'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil diperbaharui</div>";
            }
        }
        public function detail_barang($id_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `barang` WHERE `id_barang`='$id_barang'");
            $row = mysqli_fetch_array($query);
            
            $this->nama_barang=$row['nama_barang'];
            $this->id_jenis_barang=$row['id_jenis_barang'];
            $this->harga_barang=$row['harga_barang'];
            $this->jumlah_barang=$row['jumlah_barang'];
            $this->id_satuan=$row['id_satuan_barang'];
        }
        public function edit_barang_jumlah($nama_barang, $jumlah_barang){
            $koneksi = new koneksi;
            $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `barang` WHERE `nama_barang`='$nama_barang'");
            while ($row = mysqli_fetch_array($query0)) {  $jumlah_sekarang = $row['jumlah_barang'];}
            $update_jumlah = $jumlah_sekarang+$jumlah_barang;
            $query = mysqli_query($koneksi->conn, "UPDATE `barang` SET `jumlah_barang`='$update_jumlah' WHERE `nama_barang`='$nama_barang'");
        }
        public function edit_barang_retur($nama_barang, $jumlah_barang){
            $koneksi = new koneksi;
            $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `barang` WHERE `nama_barang`='$nama_barang'");
            while ($row = mysqli_fetch_array($query0)) {  $jumlah_sekarang = $row['jumlah_barang'];}
            $update_jumlah = $jumlah_sekarang-$jumlah_barang;
            $query = mysqli_query($koneksi->conn, "UPDATE `barang` SET `jumlah_barang`='$update_jumlah' WHERE `nama_barang`='$nama_barang'");
        }
    }

    class jns_barang{
        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT max(`id_jenis_barang`) FROM `jenis_barang`");
            $row = mysqli_fetch_array($query);
            if ($row) {
                $nilai_Id = substr($row[0], 3);
                $id_barang = (int) $nilai_Id;
                $id_barang = $id_barang + 1;
                $id_barang_otomatis = "JNS" . str_pad($id_barang, 1, "0", STR_PAD_LEFT);
            } else {
                $id_barang_otomatis = "JNS1";
            }
            return $id_barang_otomatis;
        }
        public function tampil_jns_barang(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT `id_jenis_barang`,`keterangan_jenis_barang` FROM `jenis_barang`");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        public function simpan($id_jenis_barang, $keterangan_jenis_barang){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn, "SELECT * FROM `jenis_barang` WHERE `id_jenis_barang`='$id_jenis_barang'");
            if (mysqli_num_rows($cek) == 0) {
                $query = mysqli_query($koneksi->conn,"INSERT INTO `jenis_barang`(`id_jenis_barang`, `keterangan_jenis_barang`) VALUES ('$id_jenis_barang',' $keterangan_jenis_barang')");
                if ($query) {
                   echo "<div class='alert alert-success'><span class='fa fa-check'> Data berhasil disimpan </span></div>";
                }
            }
        }
        public function hapus($id_jenis_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "DELETE FROM `jenis_barang` WHERE `id_jenis_barang`='$id_jenis_barang'");
            if ($query) {
                $query1 = mysqli_query($koneksi->conn, "DELETE FROM `barang` WHERE `id_jenis_barang` = '$id_jenis_barang'");
                if ($query1) {
                    echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil dihapus</div>";
                }
            }
        }
        public function edit($id_jenis_barang, $keterangan_jenis_barang){
            // `id_jenis_barang`, `keterangan_jenis_barang`
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "UPDATE `jenis_barang` SET `keterangan_jenis_barang`='$keterangan_jenis_barang' WHERE `id_jenis_barang`='$id_jenis_barang'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data barang berhasil diperbaharui</div>";
            }
        }
        public function detail($id_jenis_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `jenis_barang` WHERE `id_jenis_barang`='$id_jenis_barang'");
            $row = mysqli_fetch_array($query);
            $this->keterangan_jenis_barang=$row['keterangan_jenis_barang'];
        }
    }


    class satuan_barang{

        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT max(`id_satuan_barang`) FROM `satuan_barang`");
            $row = mysqli_fetch_array($query);
            if ($row) {
                $nilai_Id = substr($row[0], 3);
                $id_barang = (int) $nilai_Id;
                $id_barang = $id_barang + 1;
                $id_barang_otomatis = "STB" . str_pad($id_barang, 1, "0", STR_PAD_LEFT);
            } else {
                $id_barang_otomatis = "STB001";
            }
            return $id_barang_otomatis;
        }
        public function tampil_satuan_barang(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT `id_satuan_barang`,`keterangan_satuan_barang` FROM `satuan_barang`");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        public function simpan($id_satuan_barang, $keterangan_satuan_barang){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn, "SELECT * FROM `satuan_barang` WHERE `id_satuan_barang`='$id_satuan_barang'");
            if (mysqli_num_rows($cek) == 0) {
                $query = mysqli_query($koneksi->conn,"INSERT INTO `satuan_barang`(`id_satuan_barang`, `keterangan_satuan_barang`) VALUES ('$id_satuan_barang', '$keterangan_satuan_barang')");
                if ($query) {
                   echo "<div class='alert alert-success'><span class='fa fa-check'> Data berhasil disimpan</span></div>";
                }
            }
        }
        public function hapus($id_satuan_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "DELETE FROM `satuan_barang` WHERE `id_satuan_barang`='$id_satuan_barang'");
            if ($query) {
                $query1 = mysqli_query($koneksi->conn, "DELETE FROM `barang` WHERE `id_satuan_barang`='$id_satuan_barang'");
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data barang berhasil dihapus</div>";
            }
        }
        public function detail($id_satuan_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `satuan_barang` WHERE `id_satuan_barang`='$id_satuan_barang'");
            $row = mysqli_fetch_array($query);
            $this->keterangan_satuan_barang =$row['keterangan_satuan_barang'];
        }
        public function edit($id_satuan_barang, $keterangan_satuan_barang){
            
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "UPDATE `satuan_barang` SET `keterangan_satuan_barang`='$keterangan_satuan_barang' WHERE `id_satuan_barang`='$id_satuan_barang'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data barang berhasil diperbaharui</div>";
            }
        }
    }

    ?>
