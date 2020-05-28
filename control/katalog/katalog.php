<?php 
    class katalog{
        public function tampil(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT katalog.id_barang, `nama_barang`, `harga_barang`, `nama_suplier` FROM `katalog` join barang on katalog.id_barang = barang.id_barang join suplier on suplier.id_suplier = katalog.id_suplier");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        public function simpan($id_barang, $id_suplier){
            $koneksi =new koneksi;
            $cek= mysqli_query($koneksi->conn,"SELECT * FROM `katalog` WHERE `id_barang` = '$id_barang'");
            if (mysqli_num_rows($cek)==0) {
                $query= mysqli_query($koneksi->conn,"INSERT INTO `katalog`(`id_barang`, `id_suplier`) VALUES ('$id_barang','$id_suplier')");
                if ($query) {
                    echo "<div class='alert alert-success'><span class='fa fa-check'> Data berhasil disimpan </span></div>";
                }
            }
        }
        public function hapus($id_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"DELETE FROM `katalog` WHERE `id_barang`='$id_barang'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil Hapus</div>";
            }
        }
        public function edit($id_barang, $id_suplier){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `katalog` SET `id_suplier`='$id_suplier' WHERE `id_barang`='$id_barang'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil diperbaharui</div>";
            }
        }
        public function detail($id_barang){

            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `katalog` WHERE `id_barang` = '$id_barang'");
            $row = mysqli_fetch_array($query);
            
            $this->id_barang    =   $row['id_barang'];
            $this->id_suplier   =   $row['id_suplier'];
        }
        public function tampil_permint($id_suplier){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT katalog.id_barang, `nama_barang`, `harga_barang`, katalog.id_suplier, `nama_suplier` FROM `katalog`join barang on katalog.id_barang = barang.id_barang join suplier on suplier.id_suplier = katalog.id_suplier WHERE katalog.id_suplier = '$id_suplier'");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        public function tampil_keranjang($id_barang){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT katalog.id_barang, `nama_barang`, `harga_barang`, `jumlah_barang`, katalog.id_suplier, `nama_suplier` FROM `katalog`join barang on katalog.id_barang = barang.id_barang join suplier on suplier.id_suplier = katalog.id_suplier WHERE katalog.id_barang = '$id_barang'");
            $row = $query->fetch_assoc();
            
            $this->id_barang = $row['id_barang'];
            $this->nama_barang = $row['nama_barang'];
            $this->harga_barang = $row['harga_barang'];
            $this->jumlah_barang = $row['jumlah_barang'];
            $this->id_suplier = $row['id_suplier'];
            $this->nama_suplier = $row['nama_suplier'];
        }
    }
    ?>