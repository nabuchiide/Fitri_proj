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
	<!-- <body onload="window.print()"> -->
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
					DATA PERSEDIAAN BARANG
				</center>
				<div class="container">
				<table class="table" cellpadding="1" cellspacing="1">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Id Barang</th>
                          <th>Nama Barang</th>
                          <th>Jenis Barang</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          if ($barang->tampil_barang_keseluruhan() != False) {
                            $no =1;
                            foreach($barang->tampil_barang_keseluruhan() as $data_barang){
                              ?>
                            <tr>
                            <td><?php echo $no++ ;?></td>
                            <td><?php echo $data_barang['id_barang'] ;?></td>
                            <td><?php echo $data_barang['nama_barang'] ;?></td>
                            <td><?php echo $data_barang['keterangan_jenis_barang'] ;?></td>
                            <td><?php echo $data_barang['jumlah_barang'] ;?></td>
                            <td><?php echo $data_barang['keterangan_satuan_barang'] ;?></td>
                            <td><?php echo "RP ".number_format($data_barang['harga_barang']);?></td>
                          </tr>
                        <?php
                        }
                      }
                      ?>
                      </tbody>
                    </table>
					<div class="footer-content">
						
						<div>Mengetahui,</div>
						<br><br><br>
						
						
						<table>
						<div>
							<tbody>
								<tr>
									<td style="height:150px;">Kepala Gudang</td>
									<td>Pimpinan</td>
								</tr>
								<tr>
									<td><u><strong>Sri Yanti</strong></u></td>
									<td><u><strong>Nizar Sungkar</strong></u></td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				
		</div>
	</body>
	<a href="laporan_persediaan_barang.php">Dapatkan File Exel</a>
</html>

