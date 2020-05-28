<?php 
    require_once 'koneksi.php';
    require_once 'barang/barang.php';
    require_once 'relation/suplayer.php';
    require_once 'akun/user.php';
    require_once 'katalog/katalog.php';
    require_once 'permintaan_barang/permintaan_barang.php';
    require_once 'pembayaran/pembayaran.php';
    require_once 'detail_permintaan_barang/detail_permintaan.php';
    require_once 'retur/retur.php';
    require_once 'retur_detail/retur_detail.php';
    require_once 'hutang/hutang.php';
    require_once 'Laporan/laporan.php';
    

    $koneksi = new koneksi();
    $barang = new barang();
    $jenis_barang = new jns_barang();
    $satuan_barang = new jns_satuan();
    $suplier = new suplier();
    $user = new user();
    $katalog = new katalog();
    $permintaan_barang = new permintaan_barang();
    $detail_permintaan  = new detail_permintaan();
    $pembayaran = new pembayaran();
    $hutang = new hutang();
    $retur  = new retur();
    $retur_detail = new retur_detail();
    $laporan = new laporan();
   class nama2{
       public function nama_nama(){
           $this->admin = "Iis Parwati";
           $this->kepala_g = "Sri Yanti";
           $this->keuangan = "Andi";
           $this->pimpinan = "Nizar Sungkar";
        }
   }
   $nama = new nama2();
   //pembayaran, laporan hutang -> keuangan ama pimpinan
   //pembelian, retur -> admin ama keuangan
    ?>