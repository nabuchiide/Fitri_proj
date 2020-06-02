<?php 
  $id_order = $_GET['id'];
  $permintaan_barang->detil($id_order);
  $stat= $permintaan_barang->status;
 
 if (isset($_POST['beli'])) {
		$status = "barang masuk";
		$no_surat_jalan = $_POST['no_surat_jalan'];
		$no_faktur      = $_POST['no_faktur'];
		$tanggal_penerimaan = $_POST['tanggal_penerimaan'];
		// echo $status."<br>".$no_surat_jalan."<br>".$tanggal_penerimanaan;

		$permintaan_barang->di_beli($id_order, $status);
		$permintaan_barang->edit_penerimaan_barang($id_order, $tanggal_penerimaan, $no_surat_jalan, $no_faktur);
		foreach ($detail_permintaan->tampil_order($id_order) as $key){
		  $nama_barang = $key['nama_barang'];
		  $jumlah_barang = $key['jumlah'];
		  $barang->edit_barang_jumlah($nama_barang, $jumlah_barang);
		}
		unset($_SESSION['no_surat_jalan']);
		unset($_SESSION['no_faktur']);
		unset($_SESSION['tanggal_penerimaan']);
		echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_m'>";
	}
 
  if (isset($_POST['kembali'])) {
    $total_transaksi = $_SESSION['total_transaksi'];
    $jumlah = trim(ucwords($_POST['jumlah']));
    $permintaan_barang->edit_total_transaksi($id_order, $total_transaksi);
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_m'>";
  }

  if (isset($_POST['edit'])) {
    $detil_cart_id = trim($_POST['id_detail_cart']);
    $jumlah = trim(ucwords($_POST['jumlah']));
	if(!isset($_SESSION['no_surat_jalan'])){
		$_SESSION['no_surat_jalan'] = $_POST['no_surat_jalan'];
	}elseif(!isset($_SESSION['no_faktur'])){
		$_SESSION['no_faktur']      = $_POST['no_faktur'];
	}elseif(!isset($_SESSION['tanggal_penerimaan'])){
		$_SESSION['tanggal_penerimaan'] = $_POST['tanggal_penerimaan'];
	}else{
		$detail_permintaan->edt_jml($detil_cart_id, $jumlah);
	}
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_detail_m&id=".$id_order."'>";
    
  }
  if (isset($_POST['hapus'])) {
    $detil_cart_id = trim($_POST['id_detail_cart']);
    $detail_permintaan->hapus($detil_cart_id);
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_detail_m&id=".$id_order."'>";
  }
  if (isset($_POST['check'])){
	  $_SESSION['no_surat_jalan'] = $_POST['no_surat_jalan'];
	  $_SESSION['no_faktur']      = $_POST['no_faktur'];
	  $_SESSION['tanggal_penerimaan'] = $_POST['tanggal_penerimaan'];
  }
  // echo "<pre>";
  // print_r($_SESSION);
  // echo "</pre>";
  ?>
<div class="col">
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">
                <?php if ($stat == "dibeli") {
                  echo "Detail Pembelian Barang";
                } elseif ($stat == "barang masuk") {
                  echo "Detail Penerimaan Barang";
                }else{
                  echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_m'>";
                }?>
                </h6>
            </div>
            <div class="card-body" >
              <form action="" method="post">
              <p>
                <table width = "50%" >
                  <tr>
                    <td>Id Order</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->id_order;?></td>
                  </tr>
                  <tr>
                    <td>No Faktur</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="no_faktur" value="<?php if(!isset($_SESSION['no_faktur'])){echo $permintaan_barang->no_faktur;}else{echo $_SESSION['no_faktur'];}?>" required></td>
                  </tr>
                  <tr>
                    <td>No Surat Jalan</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="no_surat_jalan" value="<?php if(!isset($_SESSION['no_surat_jalan'])){ echo $permintaan_barang->no_surat_jalan; }else{echo $_SESSION['no_surat_jalan'];}?>" required></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pembelian </td>
                    <td>:</td>
                    <td><input type="date" class="form-control" name="tanggal_pembelian" value="<?php echo $permintaan_barang->tanggal_pembelian;?>" disabled></td>
                  </tr>
                  <tr>
                    <td>Tanggal Penerimaan </td>
                    <td>:</td>
                    <td><input type="date" class="form-control" name="tanggal_penerimaan" value="<?php if(!isset($_SESSION['no_surat_jalan'])){echo $permintaan_barang->tanggal_penerimaan; }else{echo $_SESSION['tanggal_penerimaan'];}?>" <?php if($permintaan_barang->status == "barang masuk") {echo "disabled";}?> required ></td>
                  </tr>
                  <tr>
                    <td>Nama Suplier</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->nama_suplier; ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->status; ?></td>
					<td <?php if(isset($_SESSION['tanggal_penerimaan'])){echo "hidden";}elseif($permintaan_barang->status == "barang masuk"){echo "hidden";}?>>
						<button type="submit" name="check" class="btn btn-sm btn-success btn-custom">
							<span class="icon text-white-50">
							<i class="fas fa-check"></i>
						</button>
					</td>
                  </tr>
                </table>
              </p>
              
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga barang</th>
                            <th>Jumlah</th>
                            <th>Sub Harga</th>
                            <th <?php if($permintaan_barang->status == "barang masuk"){echo "hidden";}?>>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      if ($detail_permintaan->tampil_order($id_order)!=false) {
                          $no = 1;
                          $total = 0;
                          $total_transaksi = 0;
                          foreach ($detail_permintaan->tampil_order($id_order) as $key){   ?>
							<tr>
								<form action="" method="post">
								<td><?php echo $no++; ?><input type="hidden" name="id_detail_cart" value="<?php echo $key['detil_cart_id'] ;?>"></td>
								<td><?php echo $key['nama_barang']; ?></td>
								<td>Rp <?php echo number_format($key['harga_transaksi'],2); ?></td>
								<td><input type="text" class="form-control" name="jumlah" id="" value="<?php echo $key['jumlah'];?>"></td>
								<td>Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2);?></td>
								<td  <?php if($permintaan_barang->status == "barang masuk"){echo "hidden";}?>>
									<button type="submit" name="edit" class="btn btn-sm btn-primary btn-custom">
										<span class="icon text-white-50">
										<i class="fas fa-pen"></i>
									</button>
									<button type="submit" name="hapus" class="btn btn-sm btn-danger btn-custom"onClick="return confirm('Apakah anda yakin ingin menghapus data?');" >
										<span class="icon text-white-50">
										<i class="fas fa-trash"></i>
									</button>
								</td>
								</form>
							</tr>
                            <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                      </tbody>
                      <?php } 
                    } 
                    $_SESSION['total_transaksi'] = $total;
                    ?>
                      <tfoot>
                        <tr>
                            <th colspan="3" align="right">Total transaksi</th>
                            <th colspan ="2">Rp <?php echo number_format($total,2); ?></th>
                            <!-- 43,420,000.00 -->
                        </tr>
                      </tfoot>
                </table>
              </div>
                <div class="row">
                <div class="col-sm-10">
                  <button type="submit" name="kembali" class="btn btn-sm btn-primary btn-custom">
                    <span class="icon text-white-50">
                      <i class="fas fa-reply"></i>
                    </span>
                    <span class="icon text-white-50">
                    kembali
                    </span>
                  </button>
                </div>
                <div class="col-sm-2">
                  <button type="submit" name="beli" class="btn btn-sm btn-success btn-custom"<?php if($permintaan_barang->status == "barang masuk"){echo "hidden";}?>>
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="icon text-white-50">
                    Rubah Status
                    </span>
                  </button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
	<?php 
		?>