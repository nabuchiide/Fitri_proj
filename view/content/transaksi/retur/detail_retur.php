<?php 
  $id_retur = $_GET['id'];
  $retur->detail($id_retur);
  $permintaan_barang->detail($retur->id_order);
  
  if (isset($_POST['kembali'])) {
    $total_transaksi = $_SESSION['total_transaksi'];
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_retur'>";
  }
  ?>
<div class="col">
      
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Detail Transaksi Retur Pembelian</h6>
            </div>
            <div class="card-body" >
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
              <form action="" method="post">
              
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
                      if ($retur_detail->tampil_retur($id_retur)!=false) {
                          $no = 1;
                          $total = 0;
                          $total_transaksi = 0;
                          foreach ($retur_detail->tampil_retur($id_retur) as $key){   ?>
                          <tr>
                            <form action="" method="post">
                            <td><?php echo $no++; ?><input type="hidden" name="detail_ret_id" value="<?php echo $key['detail_ret_id'] ;?>"></td>
                            <td><?php echo $key['nama_barang']; ?></td>
							<td><?php echo $key['jumlah'];?></td>
                            <td>Rp <?php echo number_format($key['harga_transaksi'],2); ?></td>
                            <td>Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2);?></td>
                            </form>
                          </tr>
                            <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                      <?php } 
                    } 
					echo "</tbody>" ;
                    $_SESSION['total_transaksi'] = $total;
                    ?>
                      <tfoot>
                        <tr>
                            <th colspan="4" align="right">Total transaksi</th>
                            <th colspan ="2" align="left" >Rp <?php echo number_format($total,2); ?></th>
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
                
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>