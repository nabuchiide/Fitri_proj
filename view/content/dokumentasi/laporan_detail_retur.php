<?php 
   include_once '../../../control/control.php';
	$id_retur = $_GET['id'];
        $retur->detail($id_retur);
        $permintaan_barang->detil($retur->id_order);
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
			.table tfoot th {
				border:2px solid #ddd;
				padding:0px;
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
				margin-top:0px;
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
					Detail Laporan Retur Pembelian
				</center>
				<div class="container">
				<div class="row">
				<p>
                <table width = "50%">
                  <tr>
                    <td>Id Retur</td>
                    <td>:</td>
                    <td><?php echo $retur->id_retur;?></td>
                  </tr>
                  <tr>
                    <td>Nama Suplier</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->nama_suplier; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?php echo date('d/m/Y', strtotime($retur->tanggal)); ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $retur->status; ?></td>
                  </tr>
                </table>
              </p>
					<table class="table" cellpadding="1" cellspacing="1">
					<thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      if ($retur_detail->tampil_retur($id_retur)!=false) {
                          $no = 1;
                          $total = 0;
                          $total_transaksi = 0;
                          foreach ($retur_detail->tampil_retur($id_retur) as $key){   ?>
                          <tr>
                            <form action="" method="post">
                            <td><?php echo $no++; ?><input type="hidden" name="detil_ret_id" value="<?php echo $key['detil_ret_id'] ;?>"></td>
                            <td><?php echo $key['nama_barang']; ?></td>
                            <td><?php echo $key['jumlah'];?></td>
                            <td>Rp <?php echo number_format($key['harga_transaksi'],2); ?></td>
                            <td>Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2);?></td>
                            </form>
                          </tr>
                            <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                      </tbody>
                      <?php } 
                    } ?>
                      <tfoot>
                        <tr>
                            <th colspan="4" align="right">Total transaksi</th>
                            <th colspan ="2" align="left" >Rp <?php echo number_format($total,2); ?></th>
                        </tr>
                      </tfoot>
           			 </table>
					<div class="footer-content">
						
						<div>Mengetahui,</div>
						<table>
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
	</div>
		<!-- <a href="laporan_detail_transaksi_exel.php?id=<?php echo $id_order;?>">Dapatkan File Exel</a> -->
	</body>
</html>