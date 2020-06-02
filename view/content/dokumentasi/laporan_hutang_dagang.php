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
					Laporan Hutang Dagang
				</center>
				<div class="container">
				<div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Suplier</th>
                                    <th>Hutang Dagang</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
								if (isset($_GET['src'])) {
									$src = $_GET['src'];
									$query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` join `suplier` on `suplier`.`nama_suplier` = `hutang`.`nama_suplier` WHERE `total_hutang` LIKE '%$src%' OR `suplier`.`nama_suplier` LIKE '%$src%' AND `total_hutang`>0 ");
								}else{
									$query = mysqli_query($koneksi->conn,"SELECT * FROM `hutang` join `suplier` on `suplier`.`nama_suplier` = `hutang`.`nama_suplier` WHERE `total_hutang`>0");
								}
                                $no = 1;
								while($key=mysqli_fetch_array($query)){
                                ?> 
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $key['nama_suplier']; ?></td>
                                <td>Rp <?php echo number_format($key['total_hutang'],2); ?></td>
                            </tr>
                                <?php
                                        }
                                    
                                    ?>
                            </tbody>
                           
                        </table>
                    </div>
					<div class="footer-content">
						
						<div>Mengetahui,</div>
						<table>
							<tbody>
								<tr>
									<td style="height:150px;">Keuangan</td>
									<td>Pimpinan</td>
								</tr>
								<tr>
									<td><u><strong>Andi</strong></u></td>
									<td><u><strong>Nizar Sungkar</strong></u></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
		</div>
		<!-- <a href="laporan_hutang_dagang_exel.php">Dapatkan File Exel</a> -->
	</body>
</html>

