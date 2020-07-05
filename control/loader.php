<?php 
        require_once 'koneksi.php';
        require_once 'barang/barang.php';
        require_once 'suplier/suplayer.php';
        require_once 'user/user.php';
        require_once 'katalog/katalog.php';
        require_once 'permintaan_barang/permintaan_barang.php';
        require_once 'pembayaran/pembayaran.php';
        require_once 'detail_permintaan_barang/detail_permintaan.php';
        require_once 'retur/retur.php';
        require_once 'detail_retur/detail_retur.php';
        require_once 'hutang/hutang.php';
        
    class loader{

        public function __construct($p){
            $koneksi = new koneksi();
            $barang = new barang();
            $jenis_barang = new jns_barang();
            $satuan_barang = new satuan_barang();
            $suplier = new suplier();
            $user = new user();
            $katalog = new katalog();
            $permintaan_barang = new permintaan_barang();
            $detail_permintaan  = new detail_permintaan();
            $pembayaran = new pembayaran();
            $hutang = new hutang();
            $retur  = new retur();
            $retur_detail = new retur_detail();
           
            if (isset($_GET['page'])) {
                include_once "../view/content/dashboard/dashboard.php";
            }

            if (isset($_GET[$p])) {
                $repons = $_GET[$p];
                //<>data barang
                if ($repons == 'data_barang') {
                    include_once "../view/content/barang/data_barang.php";
                }elseif ($repons == 'hapus_data_barang') {
                    include_once "../view/content/barang/hapus_data_barang.php";
                }elseif ($repons == 'update_data_barang') {
                    include_once "../view/content/barang/update_data_barang.php";
                //</>data barang
                //---------------------------------------
                //<>suplayer
                }elseif ($repons == 'suplayer') {
                    include_once "../view/content/relation/data_suplayer.php";
                }elseif ($repons == 'update_data_suplier') {
                    include_once "../view/content/relation/update_data_suplier.php";
                }elseif ($repons == 'hapus_data_suplier') {
                    include_once "../view/content/relation/hapus_data_suplier.php";
                //---------------------------------------
                //</>suplayer
                }elseif ($repons == 'user_akun') {
                    include_once "../view/content/user/data_user.php";
                }elseif ($repons == 'hapus_data_user') {
                    include_once "../view/content/user/hapus_data_user.php";
                }elseif ($repons == 'update_data_user') {
                    include_once "../view/content/user/update_data_user.php";
                 //---------------------------------------
                //</>katalog
                }elseif ($repons == 'katalog') {
                    include_once "../view/content/katalog/data_katalog.php";
                }elseif ($repons == 'update_data_katalog') {
                    include_once "../view/content/katalog/update_data_katalog.php";
                }elseif ($repons =='hapus_data_katalog') {
                    include_once "../view/content/katalog/hapus_data_katalog.php";
                    //---------------------------------------
                    //</>request
                }elseif ($repons =='request_barang') {
                    include_once "../view/content/transaksi/order/request_barang.php";
                }elseif ($repons =='order') {
                    include_once "../view/content/transaksi/order/order_barang.php";
                }
                //---------------------------------------
                   //</>verifikasi
                elseif ($repons == 'verifikasi_p') {
                    include_once "../view/content/transaksi/verifikasi_pembelian_barang/verifikasi_data.php"; // trnaskasi data pemesansn barang
                }elseif ($repons == 'verifikasi_detail_p') {
                    include_once "../view/content/transaksi/verifikasi_pembelian_barang/detail_transaksi.php"; // detail data pemesanan barang
                }elseif ($repons == 'verifikasi_m') {
                    include_once "../view/content/transaksi/verifikasi_barang_masuk/verifikasi_data.php"; // data barang masuk
                }elseif ($repons == 'verifikasi_detail_m') {
                    include_once "../view/content/transaksi/verifikasi_barang_masuk/detail_transaksi.php"; //detail data baarang masuk
                }elseif ($repons == 'data_pembayaran') {
                    include_once "../view/content/transaksi/pembayaran/data_pembayaran.php"; // pembayaran
                }elseif ($repons == 'pembayaran') {
                    include_once "../view/content/transaksi/pembayaran/input_pembayaran.php"; // manambahkan data jatuh tempo dan lainya
                }elseif ($repons == 'verifikasi_detail_pem') {
                    include_once "../view/content/transaksi/pembayaran/detail_transaksi.php"; // menampilkan detail pembayaran
                }elseif ($repons == 'data_pelunasan') {
                    include_once "../view/content/transaksi/hutang_dagang/data_pelunasan.php"; // data pelunasan
                }elseif ($repons == 'pelunasan') {
                    include_once "../view/content/transaksi/hutang_dagang/pelunasan_hutang.php"; // melakukan pelunasan hutang kepada suplier yang di hutangi
                }elseif ($repons == 'permintaan_retur') {
                   include_once "../view/content/transaksi/retur/permintaan_retur.php"; // transaksi retur pembelian
                }elseif ($repons == 'data_retur') {
                    include_once "../view/content/transaksi/retur/data_permintaan_retur.php"; // list data permintaan retur
                }elseif ($repons == 'retur_detail') {
                    include_once "../view/content/transaksi/retur/order_retur.php"; // detail retur verifikasi
                }elseif ($repons == 'list_transaksi') {
                    include_once "../view/content/transaksi/lihat_data/transaksi/list_transaksi.php"; // menampikan seluruh transaksi untuk di print out
                }elseif ($repons == 'verifikasi_detail_r') {
                    include_once "../view/content/transaksi/retur/detail_retur.php";
                }elseif ($repons == 'list_pembelian') {
                    include_once "../view/content/transaksi/lihat_data/pembelian/list_pembelian.php";
                }elseif ($repons == 'list_retur') {
                    include_once "../view/content/transaksi/lihat_data/retur/list_retur.php";
                }elseif ($repons == 'list_hutang') {
                    include_once "../view/content/transaksi/lihat_data/hutang_dagang/list_hutang.php";
                }elseif ($repons == 'list_hutang_per_sup') {
                    include_once "../view/content/transaksi/lihat_data/hutang_dagang/list_hutang_per_sup.php";
                }elseif ($repons == 'list_pembayaran') {
                    include_once "../view/content/transaksi/lihat_data/pembayaran/list_pembayaran.php";
                }
            }
        }

    }
    
    ?>

<!-- \view\content\user\level -->
