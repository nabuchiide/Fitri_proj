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
				width:90%;
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
				/* border:1px solid #ddd; */
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
	<center>
					<table class="table">
						<tr>
							<td>
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
				Laporan Pelunasan
				<table>
					<tr>
						<td>
						<?php
							if (isset($_GET['src'])){
								$src = $_GET['src'];
								// echo "src = ".$src."<br>";
								echo date('d/m/Y', strtotime($_GET['src']));
								echo "Tanggal : ";
							}
							if(isset($_GET['src1'])) {
								$src1 = $_GET['src1'];
								// echo "src1= ".$src1."<br>";
								echo " - ";
								echo date('d/m/Y', strtotime($_GET['src1']));
								}
							?>
						</td>
					</tr>
				</table>
				<div class="container">
				<table class="table" cellpadding="1" cellspacing="1">
				<thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat Jalan</th>
									<th  style="width:10%">No Faktur</th>
                                    <th>Nama Suplier</th>
                                    <th>Tanggal Pelunasan</th>
									<th  style="width:5%">Jatuh Tempo</th>
                                    <th>Hutang</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
										$laporan->laporan_pelunasan();
										?>
                            </tbody>
                        </table>
                    </div>
					</center>
            </div>
              </div>
            </div>
          </div>
    </div>

				<!-- <div class="footer-content"> -->
						
					<br><br><br>
					<center>
					<table style="width:80%;" border="0">
							<tbody>
								<tr>
									<td colspan="8" style="text-align:center">Mengetahui,</td>
								</tr>
							<tr>
								<td style="height:150px;">Keuangan</td>
								<td style="width:150px;"></td>
								<td style="text-align:right">Pimpinan</td>
							</tr>
							<tr>
								<td><u><strong>Andi</strong></u></td>
								<td style="text-align:right" colspan="8"><u><strong>Irwandi</strong></u></td>
							</tr>
						</tbody>
					</table>
					<!-- </div> -->
				</div>
				</table>
					</center>
						</td>
						</tr>
					</table>
				</center>
		</div>
		<!-- <a href="laporan_pelunasan_exel.php">Dapatkan File Exel</a> -->
	</body>
</html>