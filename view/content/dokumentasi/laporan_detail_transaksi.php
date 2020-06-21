<?php 
   include_once '../../../control/control.php';
	$id_order = $_GET['id'];
	$type = $_GET['type'];
	$permintaan_barang->detail($id_order);
  	$stat= $permintaan_barang->status;
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
			.table tfoot th {
				border:2px solid #ddd;
				padding:0px;
				font-weight:bold;
				
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
				/* text-align:center; */
				margin-top:0px;
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
					Detail Laporan <?php if ($type == 'pembelian') {
						echo "Pembelian";
					} elseif ($type == 'pembayaran') {
						echo "Pembayaran";
					} elseif ($type == 'penerimaan') {
						echo "Penerimaan";
					} elseif($type == 'pelunasan') {
						echo "Pelunasan";
					} else {
						echo "ERROR!!";
					}?>
				</center>
				<div class="container">
				<div class="row">
				<p>
				
                    <table width = "50%">
                    <tr>
                        <td>Id Order</td>
                        <td>:</td>
                        <td><?php echo $permintaan_barang->id_order;?></td>
                    </tr>
                    <tr>
                        <td>Nama Suplier</td>
                        <td>:</td>
                        <td><?php echo $permintaan_barang->nama_suplier; ?></td>
                    </tr>
					<tr <?php if($type == 'pembelian'){echo "hidden"; $a = "Admin"; $b="Keuangan"; $a1="Iis Parwati"; $b1 = "Andi";}?>>
                        <td>No Faktur</td>
                        <td>:</td>
                        <td><?php echo $permintaan_barang->no_faktur;?></td>
                    </tr>
                    <tr <?php if($type == 'pembelian'){echo "hidden"; $a = "Admin"; $b="Keuangan"; $a1="Iis Parwati"; $b1 = "Andi";}?>>
                        <td>No Surat Jalan</td>
                        <td>:</td>
                        <td><?php echo $permintaan_barang->no_surat_jalan;?></td>
                    </tr>
                    <tr <?php if($type == 'pembelian'){echo "hidden";}?>>
                        <td>Tanggal Penerimaan </td>
                        <td>:</td>
                        <td><?php echo date('d/m/Y', strtotime($permintaan_barang->tanggal_penerimaan)); ?></td>
                    </tr>
					<tr <?php if($type == 'pembayaran' || $type == 'pelunasan'){echo "hidden"; $a="Keuangan"; $b = "Pimpinan"; $a1="Andi"; $b1 = "Irwandi";}?>>
                        <td>Tanggal Pembelian </td>
                        <td>:</td>
                        <td><?php echo date('d/m/Y', strtotime($permintaan_barang->tanggal_pembelian)); ?></td>
                    </tr>
                    <tr <?php if($type == 'pembelian'){echo "hidden";}?>>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo $permintaan_barang->status; ?></td>
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
                      if ($detail_permintaan->tampil_order($id_order)!=false) {
						  $no = 1;
                          $total = 0;
                          $total_transaksi = 0;
                          foreach ($detail_permintaan->tampil_order($id_order) as $key){   ?>
                          <tr style = "border:1px solid #ddd;" >
                            <form action="" method="post">
                            <td style = "border:1px solid #ddd;" ><?php echo $no++; ?><input type="hidden" name="id_detail_cart" value="<?php echo $key['detail_cart_id'] ;?>"></td>
                            <td style = "border:1px solid #ddd;" ><?php echo $key['nama_barang']; ?></td>
                            <td style = "border:1px solid #ddd;" ><?php echo $key['jumlah'];?></td>
                            <td style = "border:1px solid #ddd;" >Rp <?php echo number_format($key['harga_transaksi'],2); ?></td>
                            <td style = "border:1px solid #ddd;" >Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2);?></td>
                            </form>
                          </tr>
                            <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                      <?php } 
                    } 
                    ?>
                        <tfoot>
                            <th colspan="4" align="left" border="1">Total transaksi</th>
                            <th colspan ="2" align="left" >Rp <?php echo number_format($total,2); ?></th>
                        </tfoot>
					</tbody>
           			 </table>
						
					<!-- <div class="footer-content"> -->
						
						<!-- <div>Mengetahui,</div> -->
						<br><br><br>
						<table style="width:80%;">
							<tbody>
								<tr>
									<td colspan="8" style="text-align:center">Mengetahui,</td>
								</tr>
								<tr>
									<td style="height:150px;">Keuangan</td>
									<td style="width:150px;"></td>
									<!-- <td style="width:150px;"></td> -->
									<td style="text-align:right">Pimpinan</td>
								</tr>
								<tr>
									<td><u><strong>Irwandi</strong></u></td>
									<td style="text-align:right" colspan="8"><u><strong>Nizar Sungkar</strong></u></td>
								</tr>
							</tbody>
						</table>
						</td>
						</tr>
					</table>
				</center>
					<!-- </div> -->
              </div>
        </div>
      </div>	
	</div>
		<!-- <a href="laporan_detail_transaksi_exel.php?id=<?php echo $id_order;?>">Dapatkan File Exel</a> -->
	</body>
</html>