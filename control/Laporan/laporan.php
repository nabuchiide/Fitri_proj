<?php 
    class laporan{
        public function laporan_retur(){
			$koneksi = new koneksi;
            if (isset($_GET['src'])) {
                $src = $_GET['src'];
                if (isset($_GET['src1'])) {
                    $src1 = $_GET['src1'];
                    // $query = mysqli_query($koneksi->conn,"SELECT id_retur, `retur`.`status`, `retur`.`total_transaksi`, `retur`.`tanggal`, `order`.`nama_suplier`, `retur`.`id_order` FROM `retur` join `order` on `retur`.`id_order` = `order`.`id_order` WHERE `retur`.`status`  LIKE '%$src%' OR `retur`.`total_transaksi` LIKE '%$src%' OR `retur`.`tanggal` LIKE '%$src%' OR `order`.`nama_suplier` LIKE '%$src%' OR `retur`.`id_order` LIKE '%$src%'");
                    $query = mysqli_query($koneksi->conn,"SELECT id_retur, `retur`.`status`, `retur`.`total_transaksi`, `retur`.`tanggal`, `order`.`nama_suplier`, `retur`.`id_order` FROM `retur` join `order` on `retur`.`id_order` = `order`.`id_order` WHERE `retur`.`tanggal` >= '$src' AND `retur`.`tanggal` <= '$src1'");
                }
            }else{
                $query = mysqli_query($koneksi->conn,"SELECT id_retur, `retur`.`status`, `retur`.`total_transaksi`, `retur`.`tanggal`, `order`.`nama_suplier`, `retur`.`id_order` FROM `retur` join `order` on `retur`.`id_order` = `order`.`id_order`");
            }
            $no = 1;
            while($key=mysqli_fetch_array($query)) {
            ?>
                <tr style = "border:1px solid #ddd;" >
                    <form action="" method="post">
                    <td style = "border:1px solid #ddd;" ><?php echo $no++; ?>
                    <input type="hidden" value="<?php echo $key['id_retur']; ?>" name="id_retur">
                    </td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['id_retur']; ?></td>
                    <td style = "border:1px solid #ddd;" ><?php echo date('d/m/Y', strtotime($key['tanggal'])); ?></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['nama_suplier']; ?></td>
                    <td style = "border:1px solid #ddd;" >Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                    </form>
                </tr><?php
                }
            
        }
        public function laporan_pembelian(){
            $status = "dipesan";
		    $koneksi = new koneksi;
			if (isset($_GET['src'])) {
                $src = $_GET['src'];
                if (isset($_GET['src1'])) {
                    $src1 = $_GET['src1'];
                    // $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `id_order` LIKE '%$src%' OR `tanggal` LIKE '%$src%' OR `status` LIKE '%$src%' OR `total_transaksi` LIKE '%$src%' OR `nama_suplier` LIKE '%$src%' OR `tanggal_penerimaan` LIKE '%$src%' OR `tanggal_pembelian` LIKE '%$src%' OR `no_surat_jalan` LIKE '%$src%' OR `tanggal_pelunasan` LIKE '%$src%' AND  `status`<>'$status'");
                    $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`<>'$status' AND `tanggal_pembelian` >= '$src' AND `tanggal_pembelian` <= '$src1'");
                }
            }else {
                $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`<>'$status'");
            }
            $no = 1;
            $empty_date = '0000-00-00';
			while($key=mysqli_fetch_array($query)){ ?>
                <tr style = "border:1px solid #ddd;" >
                	<form action="" method="post">
                    <td style = "border:1px solid #ddd;" ><?php echo $no++; ?><input type="hidden" name="id_order" value="<?php echo $key['id_order']?>"></td>
            	    <td style = "border:1px solid #ddd;" ><?php echo $key['nama_suplier']; ?></td>
                    <td style = "border:1px solid #ddd;" ><?php if($empty_date == $key['tanggal_pembelian']){echo "Proses Pembelian";}else{echo date('d/m/Y', strtotime($key['tanggal_pembelian'])); }?></td>
                    <td style = "border:1px solid #ddd;" >Rp <?php echo number_format($key['total_transaksi']);?></td>
                    </form>
                </tr> <?php
			}
        }
        public function laporan_pelunasan(){
            $no =1;
			$koneksi = new koneksi;
			if (isset($_GET['src'])) {
                $src = $_GET['src'];
                if (isset($_GET['src1'])) {
                    $src1 = $_GET['src1'];
                    $query = mysqli_query($koneksi->conn,"SELECT `id_pembayaran`, `pembayaran`.`id_order`, `nomor_faktur`,`tanggal`,`tanggal_penerimaan`, `tanggal_pelunasan`, `tanggal_pembelian`, `no_surat_jalan`, `nama_suplier`, `order`.`status`, `pembayaran`.`status`,`total_transaksi`, `tempo` as `akhir pembayaran` from `pembayaran` join `order` on `pembayaran`.`id_order` = `order`.`id_order` WHERE `tanggal_pelunasan` >= '$src' AND `tanggal_pelunasan` <='$src1'");
                }
            }else{
                $query = mysqli_query($koneksi->conn,"SELECT `id_pembayaran`, `pembayaran`.`id_order`,`tanggal`,`tanggal_penerimaan`, `nomor_faktur`, `tanggal_pelunasan`, `tanggal_pembelian`, `no_surat_jalan`, `nama_suplier`, `order`.`status`, `pembayaran`.`status`,`total_transaksi`, `tempo` as `akhir pembayaran` from `pembayaran` join `order` on `pembayaran`.`id_order` = `order`.`id_order`");
            }
            
            while($key=mysqli_fetch_array($query)) {
                if ($key['status'] == 'Belum Lunas') {
                    $date = strtotime(date('Y-m-d', strtotime($key['tanggal_penerimaan']))); 
                    $Today= strtotime(date('Y-m-d'));
                    $beda_hari = $Today - $date;
                    $tempo_jth = floor($beda_hari/(60*60*24));
                    $rentang_waktu = $key['akhir pembayaran'];
                    if ($tempo_jth >= $rentang_waktu) {
                        $a = "Jatuh Tempo";
                        }else {
                                if ($rentang_waktu - $tempo_jth == 1) {
                                    $a = "Jatuh Tempo Besok";
                                }elseif ($rentang_waktu - $tempo_jth == 2) {
                                    $a = "2 Hari Lagi Jatuh Tempo";
                                }elseif ($rentang_waktu - $tempo_jth == 3) {
                                    $a = "3 Hari Lagi Jatuh Tempo";
                                }else {
                                    $a = "Belum Jatuh Tempo";
                                        }
                                    }
                }else {
                    $a = "Sudah Lunas";
                    } ?> 
                <tr style = "border:1px solid #ddd;" >
                    <form action="" method="post">
                    <td style = "border:1px solid #ddd;" ><?php echo $no++; ?> <input type="hidden" value="<?php echo $key['id_pembayaran']; ?>" name="id_pembayaran"> </td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['no_surat_jalan']; ?> <input type="hidden" value="<?php echo $key['status']; ?>" name="status"></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['nomor_faktur']?></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['nama_suplier']; ?></td>
                    <td style = "border:1px solid #ddd;" ><?php if ($key['status'] == "Belum Lunas") { echo "Proses verifikasi"; } else { echo date('d/m/Y', strtotime($key['tanggal_pelunasan'])); }?></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['akhir pembayaran']?></td>
                    <td style = "border:1px solid #ddd;" >Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['status']; ?></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $a; ?></td>
                    </form>
                </tr> <?php }
        }
        public function laporan_pembayaran(){
            $status = "dipesan";
            $status1 = "dibeli";
			$koneksi = new koneksi;
            if (isset($_GET['src'])) {
                $src = $_GET['src'];
                if (isset($_GET['src1'])) {
                    $src1 = $_GET['src1'];
                    $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `tanggal_penerimaan` >= '$src' AND `tanggal_penerimaan` <= '$src1' AND  `status`<>'$status' AND `status`<>'$status1'");
                }
            }else {
                $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`<>'$status' AND `status`<>'$status1'");
            }
            $no = 1;
            $empty_date = '0000-00-00';
			while($key=mysqli_fetch_array($query)){ ?>
                <tr style = "border:1px solid #ddd;" >
                	<form action="" method="post">
                    <td style = "border:1px solid #ddd;" ><?php echo $no++; ?><input type="hidden" name="id_order" value="<?php echo $key['id_order']?>"></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['nomor_faktur']?></td>
                    <td style = "border:1px solid #ddd;" ><?php echo $key['no_surat_jalan']?></td>
            	    <td style = "border:1px solid #ddd;" ><?php echo $key['nama_suplier']; ?></td>
                    <td style = "border:1px solid #ddd;" ><?php if($empty_date == $key['tanggal_penerimaan']){echo "Proses Pembayaran";}else{echo date('d/m/Y', strtotime($key['tanggal_penerimaan'])); }?></td>
                    <td style = "border:1px solid #ddd;" >Rp <?php echo number_format($key['total_transaksi']);?></td>
                    </form>
                </tr> <?php
            }
        }
    }
?>