<?php 
    class koneksi{
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbname = "hph_proj_db";
        private $dbpass = "";
        public $conn;

        public function __construct(){
        $this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname) or die("Koneksi gagal");
        }
    }
    ?> 
