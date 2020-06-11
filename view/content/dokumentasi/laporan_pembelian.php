<?php 
   include_once '../../../control/control.php';
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
				width:80%;
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
				text-align:left;
				
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
					LAPORAN PEMBELIAN
					
				<div class="container">
				<?php
					if (isset($_GET['src'])){
						echo "Tanggal : ";
						echo date('d/m/Y', strtotime($_GET['src'])); 
					}
					?>
				<table class="table" cellpadding="1" cellspacing="1">
					<thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Suplier</th>
            	            <th>Tanggal Pembelian</th>
                            <th>Total Transaksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
							$laporan->laporan_pembelian();
							?>
                        </tbody>
                </table>
				</center>
				<div class="footer-content">
						
					<div>Mengetahui,</div>
					<table>
						<tbody>
							<tr>
								<td style="height:150px;">Admin</td>
								<td>Keuangan</td>
							</tr>
							<tr>
                            <br>
                            <br>							
								<td><u><strong>Iis Parwati</strong></u></td>
								<td><u><strong>Nizar Sungkar</strong></u></td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
				
		</div>
		<!-- <a href="laporan_pembelian_exel.php">Dapatkan File Exel</a> -->
	</body>
</html>