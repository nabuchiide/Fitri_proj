<?php 
    // $id_user, $nama_user, $nomor_telepon, $password, $level
    class user{
        public function tampil(){
            $koneksi = new koneksi; // buat kelas koneksi
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `user`"); // ambil SQL data dari kelas koneksi menggunakan SQL Language
            if (mysqli_num_rows($query)>0) {
                while ($row = mysqli_fetch_array($query)) {
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function id_terakhir(){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT max(`id_user`) FROM `user`");
            $row = mysqli_fetch_array($query);
                if ($row) {
                    $nilai_Id = substr($row[0],3);
                    $id_user = (int) $nilai_Id;
                    $id_user = $id_user + 1;
                    $id_user_otomatis = "USR".str_pad($id_user,2,"0", STR_PAD_LEFT);
                }else {
                    $id_user_otomatis = "USR01";
                }
            return $id_user_otomatis;
        }
        public function simpan($id_user, $nama_user, $nomor_telepon, $password, $level){
            $koneksi = new koneksi;
            $cek = mysqli_query($koneksi->conn, "SELECT * FROM `user` WHERE `id_user`='$id_user'");
            if (mysqli_num_rows($cek)== 0) {
                $query = mysqli_query($koneksi->conn, "INSERT INTO `user`(`id_user`, `nama_user`, `nomor_telepon`, `password`, `level`) VALUES ('$id_user','$nama_user','$nomor_telepon','$password','$level')");
                if ($query) {
                    echo "<div class='alert alert-success'><span class='fa fa-check'> Data berhasil disimpan </span></div>";
                }
            }
        }
        public function hapus($id_user){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"DELETE FROM `user` WHERE `id_user` = '$id_user'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil dihapus</div>";
            }
        }
        public function edit($id_user, $nama_user, $nomor_telepon, $level){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"UPDATE `user` SET `nama_user`='$nama_user',`nomor_telepon`='$nomor_telepon',`level`='$level' WHERE `id_user`= '$id_user'");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil diperbaharui</div>";
            }
        }
        public function detail($id_user){
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT * FROM `user` WHERE `id_user`='$id_user'");
            $row = mysqli_fetch_array($query);
            
            $this->id_user = $row['id_user'];
            $this->nama_user = $row['nama_user'];
            $this->nomor_telepon = $row['nomor_telepon'];
            $this->password = $row['password'];
            $this->level = $row['level'];
        }
        public function login($id_user,$password){
            $_SESSION['id_user']='';
            $_SESSION['nama_user']='';
            $_SESSION['level']='';
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn, "SELECT * FROM `user` WHERE `id_user`='$id_user'");
            
            if (mysqli_num_rows($query)> 0) {
                $row = mysqli_fetch_assoc($query);
                if ($password == $row['password'] && $id_user == $row['id_user']) {
                    $id_username = $row['id_user'];
                    $nama_user = $row['nama_user'];
                    $level = $row['level'];
                    $_SESSION['id_user'] = $id_username;
                    $_SESSION['nama_user'] = $nama_user;
                    $_SESSION['level'] = $level;
                    $_SESSION['login'] = true;
                }else {
                    unset($_SESSION['id_user']);
                    unset($_SESSION['nama_user']);
                    unset($_SESSION['level']);
                    $_SESSION['login'] = false;
                    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                    session_destroy();
                }
            }
        }
    }
    ?>