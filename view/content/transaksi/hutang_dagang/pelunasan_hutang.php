<?php 
  
  $id_pembayaran = $_GET['id'];
  $pembayaran->detail($id_pembayaran);
  $id_order = $pembayaran->id_order;
  $permintaan_barang->detil($id_order);
  $status = $permintaan_barang->status;
      if (isset($_POST['lunas'])) {
        // mengambil data dari form
        $id_pembayaran      = trim($_POST['Id_pembayaran']);
        $id_order           = trim($_POST['Id_req']);
        $tempo              = trim($_POST['tempo']);
        $status             = "Lunas";
        $status_pembayaran  = "Lunas";
        $permintaan_barang->detil($id_order);
        $nama_suplier = $permintaan_barang->nama_suplier;
        $total_hutang = $permintaan_barang->total_transaksi;
        $tanggal_pelunasan = $_POST['tanggal_pelunasan'];
        // echo $id_pembayaran."<br>".$id_order."<br>".$tempo."<br>".$status."<br>".$status_pembayaran."<br>".$nama_suplier."<br>".$total_hutang."<br>".$tanggal_pelunasan;
        $permintaan_barang->di_beli($id_order, $status);
        $permintaan_barang->edit_tanggal_pelunasan($id_order, $tanggal_pelunasan);
        $pembayaran->edit_status($id_pembayaran, $status);
        $hutang-> kurang_hutang($nama_suplier, $total_hutang);
        echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data Pelunasan Berhasil dilunasi</div>";
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_pelunasan'>";
      }
  ?>
<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-credit-card" aria-hidden="true"></i>    
            Pelunasan
        </h1>
    </div>
    <hr class ="sidebar-diver"></hr>

    <div class="row justify-content-center mb-4 align-items-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-left-dark " style="width: 45rem;">
                <div class="card-body">
                    <h5 class="card-title">Pelunasan Transaksi</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Pembayaran</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $pembayaran->id_pembayaran;?>" name="Id_pembayaran" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Order Barang</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="Id_req" value="<?php echo $permintaan_barang->id_order;?>"readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Jatuh Tempo</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="tempo" readonly value="<?php echo $pembayaran->temp?> Hari">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Tanggal Penerimaan</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" id="" name="tanggal_pemebayaran" value="<?php echo $permintaan_barang->tanggal_penerimaan;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Tanggal Pelunasan</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" id="" name="tanggal_pelunasan" value="<?php echo $permintaan_barang->tanggal_pelunasan;?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Total transaksi</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="total_transaksi" value="Rp <?php echo number_format($permintaan_barang->total_transaksi,2);?>"readonly>
                            </div>
                        </div>
                      </p>
                      <p>
                      
                        <a href="index.php?p=data_pelunasan" class="btn btn-sm btn-secondary btn-custom">
                          <span class="icon text-white-50">
                              <i class="fas fa-reply"></i>
                          </span>
                        <span class="text">Kembali</span>
                      </a>
                      <button type="submit" name="lunas" class="btn btn-sm btn-success btn-custom"  <?php if($status == "Lunas"){echo "hidden";}?>>
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                          </span>
                          <span class="text">Lunasi</span>
                        </button>
                      </form>
                    </p>
                </div>
              </div>
        </div>
    </div>
    <hr class ="sidebar-diver"></hr>
