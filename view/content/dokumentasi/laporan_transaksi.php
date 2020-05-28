<?php 
   include_once '../../../control/control.php';
//    header("Content-Type: text/x-csv");
//    header("Content-Disposition: attachment; filename:Laporan.csv");
//    header("Pragma: no-chace");
//    header("Expires: 0");
			// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			// header("Content-Disposition: attachment; filename=laporan transaksi.xls"); // Set nama file excel nya
			// header('Cache-Control: max-age=0');
   ?>
<html>
	<head>
   
		<style>
			
			.header{
				
			}
			
			.head-logo{
				min-width:100%;
				max-width:100%;
			}
			
			.header{

			}
			
			.logo{
				margin-top:35px;
				max-width:130px;
				min-height:120px;
			}
			
			.for-title{
				text-align:center;
				float:left;
			}
			
			.for-title div{
				padding-top:10px;
			}
			
			
			.table{
				width:100%;
				margin-top:20px;
				border-spacing:0;
				border-collapse:collapse;
			}
			
			.container{
				padding:20px 40px;
			}
			.table thead th {
				border:2px solid #ddd;
				padding:10px;
				font-weight:bold;
				
			}
			
			.table tbody tr td{
				border:1px solid #ddd;
				text-align:left;
			}
			
			.footer-content{
				padding-top:100px;
				width:100%;
				text-align:center;
				font-size:17px;

			}

			.footer-content table{
				width:70%;
				margin:0px auto;
				text-align:center;
				margin-top:50px;
				font-size:17px;
			}
		</style>
	</head>
	<body onload="window.print()">

		<div class="header">
			<table style="width:100%">
				<tr>
					<td style="width:31%;text-align:right;padding-right:10px">
						<div class="for-logo">
							<img src="../../../atribut/img/harapan.png" class="logo">
						</div>
					</td>
					<td style="padding-left:50px;">
						<div class="for-title">
							<h1>PT. HAS PUTRA HARAPAN</h1>
							<div style="margin-top:-20px">
								Jln. Rm Soleh No. 38 Kelurahan Nagasari
							</div> 	
							<div>
								Kecamatan Karawang Barat Kabupaten Karawang 41361
							</div>
							<div>
								Telp & Fax (0267) 8451050	
							</div>
						</div>						
					</td>
				</tr>
			</table>
				<hr>
				<hr>
				<center>
					Data Transaksi
					
				</center>
				<div class="container">
				<table class="table" cellpadding="1" cellspacing="1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Order</th>
                                    <th>Nama Suplier</th>
                                    <th>Status</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Tanggal Penerimaan</th>
                                    <th>Tanggal Pelunasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if ($permintaan_barang->tampil()!=false) {
                                        $no = 1;
                                        $empty_date = '0000-00-00';
                                        foreach ($permintaan_barang->tampil() as $key) {
                                            ?>
                                            <tr>
                                                <form action="" method="post">
                                                    <td><?php echo $no++; ?><input type="hidden" name="id_order" value="<?php echo $key['id_order']?>"></td>
                                                    <td><?php echo $key['id_order']?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td><?php echo $key['status']; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($key['tanggal'])); ?></td>
                                                    <td><?php if($empty_date == $key['tanggal_pembelian']){echo "Proses Pembelian";}else{echo date('d/m/Y', strtotime($key['tanggal_pembelian'])); }?></td>
                                                    <td><?php if($empty_date == $key['tanggal_penerimaan']){echo "Proses Pengiriman";}else{echo date('d/m/Y', strtotime($key['tanggal_penerimaan'])); }?></td>
                                                    <td><?php if($empty_date == $key['tanggal_pelunasan']){echo "Proses Pelunasan";}else{echo date('d/m/Y', strtotime($key['tanggal_pelunasan'])); }?></td>
                                                </form>
                                            </tr>
                                <?php
                                        }
                                    }
                                    ?>
                                    
                            </tbody>
                           
                        </table>
				
				<div class="footer-content">
						
					<div>Mengetahui,</div>
					<table>
						<tbody>
							<tr>
								<td style="height:150px;">Keuangan</td>
								<td>Pimpinan</td>
							</tr>
							<tr>
								<td><u><strong>Ahmad Denejad</strong></u></td>
								<td><u><strong>Nizar Sungkar</strong></u></td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
				
		</div>
		<a href="laporan_transaksi_exel.php">Dapatkan File Exel</a>
	</body>
</html>