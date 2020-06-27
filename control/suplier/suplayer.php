<?php 
    // $id_suplier, $nama_suplier, $nomor_telepon, $alamat
    class suplier{
        public function tampil(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `suplier`");
            if (mysqli_num_rows($query)>0) {
                while ($row= mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT max(`id_suplier`) FROM `suplier`");
            $row = mysqli_fetch_array($query);
            if ($row) {
                $nilai_Id = substr($row[0], 3);
                $id_suplier = (int) $nilai_Id;
                $id_suplier = $id_suplier + 1;
                $id_suplier_otomatis = "SPL" .str_pad($id_suplier, 3, "0", STR_PAD_LEFT);
            }else{
                $id_suplier_otomatis = "SPL001"; 
            }
            return $id_suplier_otomatis;
        }
        public function simpan($id_suplier, $nama_suplier, $nomor_telepon, $alamat){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn,"SELECT * FROM `suplier` WHERE id_suplier='$id_suplier'");
            if (mysqli_num_rows($cek)== 0) {
                $query = mysqli_query($koneksi->conn,"INSERT INTO `suplier`(`id_suplier`, `nama_suplier`, `nomor_telepon`, `alamat`) VALUES ('$id_suplier','$nama_suplier','$nomor_telepon','$alamat')");
                if ($query) {
                    echo "<div class='alert alert-success'><span class='fa fa-check'> Data berhasil disimpan </span></div>";
                }
            }
        }
        public function hapus($id_suplier){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"DELETE FROM `suplier` WHERE `id_suplier`= '$id_suplier'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil dihapus</div>";
            }
        }
        public function edit($id_suplier, $nama_suplier, $nomor_telepon, $alamat){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `suplier` SET `nama_suplier`='$nama_suplier',`nomor_telepon`=' $nomor_telepon',`alamat`='$alamat' WHERE `id_suplier`='$id_suplier'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil diperbaharui</div>";
            }

        }
        public function detail($id_suplier){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `suplier` WHERE `id_suplier`= '$id_suplier'");
            $row = $query->fetch_assoc();
            
            $this->nama_suplier = $row['nama_suplier'];
            $this->nomor_telepon = $row['nomor_telepon'];
            $this->alamat = $row['alamat'];
        }

        public function detail_nama($nama_suplier){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `suplier` WHERE `nama_suplier`='$nama_suplier'");
            $row = $query->fetch_assoc();
            
            $this->id_suplier = $row['id_suplier'];
            $this->nama_suplier = $row['nama_suplier'];
            $this->nomor_telepon = $row['nomor_telepon'];
            $this->alamat = $row['alamat'];
        }
    }
    ?>