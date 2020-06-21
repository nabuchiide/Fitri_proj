<?php 
	$id_order = $_SESSION['Id_order'];
  $id_retur = $_SESSION['Id_ret'];
	$permintaan_barang->detail($id_order);
  $stat = $permintaan_barang->status;
  $nama_suplier = $permintaan_barang->nama_suplier;
    if (!isset($_SESSION['Id_order'])) {
      echo "<meta http-equiv='refresh' content='1;url=index.php?p=permintaan_retur'>";
    }

    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'hapus') {
        foreach ($_SESSION['cart'] as $keys => $value) {
          if ($value['item_id']== $_GET['id_hps']) {
            unset($_SESSION['cart'][$keys]);
            echo "<div class='alert alert-danger'><span class='fa fa-check'>Item Barang Berhasil dihupus</span></div>";
          }
        }
      }
    }
    
    if (isset($_POST['ordered'])) {
        $tanggal               = trim($_POST['hari_ini']);
        $status   = "Retur";
        $_SESSION['date']   = $tanggal;
        $total_transaksi = $_SESSION['total_belanja'];
        if ($stat != "Lunas"){
        $permintaan_barang->edit_total_transaksi_retur($id_order, $total_transaksi);
        $hutang-> kurang_hutang($nama_suplier, $total_transaksi);  
        }
        $retur->simpan($id_retur, $status, $total_transaksi, $tanggal, $id_order);
        foreach ($_SESSION['cart'] as $keys => $values) {
          $nama_barang = $values["item_nama"];
          $harga_transaksi = $values["item_harga"];
          $jumlah_barang = $values["item_jumlah"];
          $detail_cart_id = $values["item_id"];
          $barang->edit_barang_retur($nama_barang, $jumlah_barang);
          $detail_permintaan->edit_jumlah_ret($detail_cart_id,  $jumlah_barang);
          $retur_detail->simpan($nama_barang, $harga_transaksi, $id_retur, $jumlah_barang);
        }
        echo "<div class='alert alert-success'><span class='fa fa-check'> Data transaksi berhasil disimpan</span></div>";
        unset($_SESSION['Id_ret']);
        unset($_SESSION['id_order']);
        unset($_SESSION['date']);
        unset($_SESSION['total_belanja']);
        unset($_SESSION['cart']);
    }

    if (isset($_POST['edit'])) {
      $jumlah     = trim($_POST['jumlah']);
      $id_barang = trim($_POST['id_bar']);
      foreach ($_SESSION['cart'] as $keys => $value) {
        if ($value['item_id']== $id_barang) {
          $_SESSION['cart'][$keys]['item_jumlah'] = $jumlah;
          echo "<div class='alert alert-success'><span class='fa fa-check'> Jumlah Item Barang Berhasil diperbaharui</span></div>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?p=retur_detail'>";
            }
        }
    }
    ?>
    <div class="col">
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Detail Permintaan Retur</h6>
            </div>
            <div class="card-body" >
              <form action="" method="post">
              <div class="form-group row">
                <label for="" class="col-sm-1 col-form-label">Tanggal</label>
                <div class="col-sm-2">
                  <input type="date" class="form-control" name="hari_ini" value="<?php echo $_SESSION['date'];?>" required>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Harga</th>
                            <th width="10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if (!empty($_SESSION['cart'])) {
                        $total= 0;
                        foreach ($_SESSION['cart'] as $keys => $values) {
                        ?>
                         <tr>
                        <form action="" method="post">
                          <td><?php echo $values["item_nama"];?><input type="hidden" value="<?php echo $values["item_id"]; ?>" name="id_bar"></td>
                          <td>Rp. <?php echo number_format($values["item_harga"],2);?></td>
                          <td>
                          <input type="text" class="form-control"  name="jumlah" value = "<?php echo $values["item_jumlah"];?>">
                          </td>
                          <td><?php echo number_format($values["item_jumlah"] * $values["item_harga"],2);?></td>
                          <td >
                            <button type="submit" name="edit" class="btn btn-sm btn-primary btn-custom" >
                                <span class="icon text-white-50">
                                  <i class="fas fa-pen"></i>
                                </span>
                            </button>
                        </form>
                            <a href="?p=retur_detail&action=hapus&id_hps=<?php echo $values["item_id"]; ?>" class="btn btn-sm btn-danger btn-custom " onClick="return confirm('Apakah anda yakin ingin menghapus?');">
                              <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                              </span>
                            </a>
                          </td>
                        </tr>
                        <?php
                            $total = $total + ($values["item_jumlah"] * $values["item_harga"]);
                            }?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="3" align="right">Total Transaksi</th>
                            <th colspan ="2" align="left" >Rp <?php echo number_format($total,2); ?></th>
                        </tr>
                      </tfoot>
                      <?php 
                        $_SESSION['total_belanja'] = $total;
                          } else {
                        echo "<meta http-equiv='refresh' content='1;url=index.php?p=permintaan_retur'>";
                      }?> 
                </table>
              </div>
                <div class="row">
                <div class="col-sm-8">
                  <a href="?p=request_barang">
                  <button type="submit" name="order" class="btn btn-sm btn-primary btn-custom">
                    <span class="icon text-white-50">
                      <i class="fas fa-list"></i>
                    </span>
                    <span class="icon text-white-50">
                    Daftar Permintaan
                    </span>
                  </button>
                  </a>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                  <button type="submit" name="ordered" class="btn btn-sm btn-success btn-custom">
                    <span class="icon text-white-50">
                      <i class="fas fa-random"></i>
                    </span>
                    <span class="icon text-white-50">
                      Retur Barang
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
    <?php 
     
      if (isset($_POST['order'])) {
        $tanggal               = trim($_POST['hari_ini']);
        $_SESSION['date']   = $tanggal;
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=permintaan_retur'>";
      }
      

      ?>