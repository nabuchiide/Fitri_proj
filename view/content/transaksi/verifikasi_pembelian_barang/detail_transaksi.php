<?php 
  $id_order = $_GET['id'];
  $permintaan_barang->detail($id_order);
  if (isset($_POST['beli'])) {
    $status = "dibeli";
    $tanggal_pembelian = $_POST['tanggal_pembelian']; 
    $_SESSION['tanggal_pembelian'] = $tanggal_pembelian;
    $permintaan_barang->di_beli($id_order, $status);
    $permintaan_barang->edit_tanggal_pembelian_barang($id_order, $_SESSION['tanggal_pembelian']);
    
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_p'>";
  }
  // if (isset($_POST['bayar'])) {
  //   $status = "dibayar";
  //   $permintaan_barang->di_beli($id_order, $status);
  //   //echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_p'>";
  // }
  if (isset($_POST['kembali'])) {
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_p'>";
  }
  ?>
<div class="col">
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold"><?php if ($permintaan_barang->status == "dipesan") {
                  echo "Detail Permintaan Barang";
                }else{
                  echo "Detail Transaksi Pembelian Barang";
                }?></h6>
            </div>

            <form action="" method="post">
            <div class="card-body" >
              <p>
               <table width="50%">
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
                  <tr>
                    <td>Tanggal Permintaan</td>
                    <td>:</td>
                    <td><input type="date" class="form-control col-sm-7" name="tanggal_pembelian" value="<?php echo $permintaan_barang->tanggal;?>" disabled></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pembelian</td>
                    <td>:</td>
                    <td><input type="date" class="form-control col-sm-7" name="tanggal_pembelian" value="<?php echo $permintaan_barang->tanggal_pembelian;?>" required <?php if($permintaan_barang->status == "dibeli"){echo "disabled";}?>></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->status; ?></td>
                  </tr>
                </table>
              </p>
              
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
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
                          foreach ($detail_permintaan->tampil_order($id_order) as $key){   ?>
                          <tr>
                            <form action="" method="post">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $key['nama_barang']; ?></td>
                            <td><?php echo $key['jumlah'];?></td>
                            <td>Rp <?php echo number_format($key['harga_transaksi'],2);?></td>
                            <td>Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2); ?></td>
                            </form>
                          </tr>
                            <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                      <?php } } ?>
					  </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="4" align="right"><?php if($permintaan_barang->status == "dipesan"){echo "Total Harga";} else {echo "Total Transaksi";}?></th>
                            <th colspan ="2" align="left" >Rp <?php echo number_format($total,2); ?></th>
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
                  <button type="submit" name="beli" class="btn btn-sm btn-success btn-custom" <?php if($permintaan_barang->status == "dibeli"){echo "hidden";}?>> 
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="icon text-white-50">
                    Ubah Status
                    </span>
                  </button>
                  <div class="col-sm">
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>