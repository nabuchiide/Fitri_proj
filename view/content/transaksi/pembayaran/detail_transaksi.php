<?php 
  $id_order = $_GET['id'];
  $permintaan_barang->detil($id_order);
  $stat= $permintaan_barang->status;
  
  if (isset($_POST['kembali'])) {
    $total_transaksi = $_SESSION['total_transaksi'];
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_pembayaran'>";
  }
  ?>
<div class="col">
      
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold"><?php if ($stat == "Porses Pelunasan") {
                  echo "Detail Pelunasan";
                }elseif ($stat == "barang masuk") {
                  echo "Detail Pembayaran";
                }else {
                  echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_pembayaran'>";
                }?>
                </h6>
            </div>
            <div class="card-body" >
              <p>
                <table width = "50%">
                  <tr>
                    <td>Id</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->id_order;?></td>
                  </tr>
                  <tr>
                    <td>No Surat Jalan</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->no_surat_jalan;?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Penerimaan </td>
                    <td>:</td>
                    <td><?php echo date('d/m/Y', strtotime($permintaan_barang->tanggal_penerimaan)); ?></td>
                  </tr>
                  <tr>
                    <td>Suplier</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->nama_suplier; ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->status; ?></td>
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
                            <th>Harga barang</th>
                            <th>Jumlah</th>
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
                          <tr>
                            <form action="" method="post">
                            <td><?php echo $no++; ?><input type="hidden" name="id_detail_cart" value="<?php echo $key['detil_cart_id'] ;?>"></td>
                            <td><?php echo $key['nama_barang']; ?></td>
                            <td>Rp <?php echo number_format($key['harga_transaksi'],2); ?></td>
                            <td><?php echo $key['jumlah'];?></td>
                            <td>Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2);?></td>
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