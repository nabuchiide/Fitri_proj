<?php 
    // if (!isset($_SESSION['suplier'])) {
    //   echo "<meta http-equiv='refresh' content='1;url=index.php?p=request_barang'>";
    // }

    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'hapus') {
        foreach ($_SESSION['cart'] as $keys => $value) {
          if ($value['item_id']== $_GET['id_hps']) {
            unset($_SESSION['cart'][$keys]);
            echo "<div class='alert alert-danger'><span class='fa fa-check'>Item Barang Berhasil dihupus</span></div>";
            echo " <meta http-equiv='refresh' content='1;url=index.php?p=order'>";
          }
        }
      }
    }

    if (isset($_POST['edit'])) {
      $jumlah     = trim($_POST['jumlah']);
      $id_barang = trim($_POST['id_bar']);
      // echo $jumlah."<br>";
      // echo $id_barang."<br>";
      foreach ($_SESSION['cart'] as $keys => $value) {
        if ($value['item_id']== $id_barang) {
          $_SESSION['cart'][$keys]['item_jumlah'] = $jumlah;
          echo "<div class='alert alert-success'><span class='fa fa-check'> Jumlah Item Barang Berhasil diperbaharui</span></div>";
          echo " <meta http-equiv='refresh' content='1;url=index.php?p=order'>";
           }
      }
    }

    if (isset($_POST['ordered'])) {
      $status = "dipesan";
      $date               = trim($_POST['hari_ini']);
      $id_order = $_SESSION['id_order'];
      $_SESSION['date']   = $date;
      $total_transaksi = $_SESSION['total_belanja'];
      $id_suplier = $_SESSION['suplier'];
      $suplier->detail($id_suplier);
      $nama_suplier = $suplier->nama_suplier; 
      $permintaan_barang->simpan($id_order, $date, $total_transaksi, $nama_suplier, $status);
      foreach ($_SESSION['cart'] as $keys => $values) {
        $nama_barang = $values["item_nama"];
        $harga_transaksi = $values["item_harga"];
        $jumlah_barang = $values["item_jumlah"];
        $detail_permintaan->simpan($nama_barang, $harga_transaksi, $id_order, $jumlah_barang);
      }
      echo "<div class='alert alert-success'><span class='fa fa-check'> Data Permintaan Berhasil disimpan</span></div>";
      unset($_SESSION['suplier']);
      unset($_SESSION['id_order']);
      unset($_SESSION['date']);
      unset($_SESSION['total_belanja']);
      unset($_SESSION['cart']);
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
              <h6 class="m-0 font-weight-bold">Detail Permintaan</h6>
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
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub Harga</th>
                            <th>Aksi</th>
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
                          <input type="hidden" value="<?php echo $values["item_id"]; ?>" name="id_bar">
                          <td><?php echo $values["item_nama"];?></td>
                          <td>
                          <input type="text" class="form-control"  name="jumlah" value = "<?php echo $values["item_jumlah"];?>">
                          </td>
                          <td>Rp. <?php echo number_format($values["item_harga"],2);?></td>
                          <td><?php echo number_format($values["item_jumlah"] * $values["item_harga"],2);?></td>
                          <td >
                            <button type="submit" name="edit" class="btn btn-sm btn-primary btn-custom" >
                                <span class="icon text-white-50">
                                  <i class="fas fa-pen"></i>
                                </span>
                                <span class="icon text-white-50">
                                </span>
                            </button>
                            <a href="?p=order&action=hapus&id_hps=<?php echo $values["item_id"]; ?>" class="btn btn-sm btn-danger btn-custom " onClick="return confirm('Yakin Akan Menghapus Data?');">
                              <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                              </span>
                            </a> 
                          </td>
                          </form>
                        </tr>
                        <?php
                            $total = $total + ($values["item_jumlah"] * $values["item_harga"]);
                            }?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="3" align="right">Total Harga</th>
                            <th colspan ="2" align="left" >Rp <?php echo number_format($total,2); ?></th>
                        </tr>
                      </tfoot>
                      <?php 
                        $_SESSION['total_belanja'] = $total;
                          } else {
                        echo "<meta http-equiv='refresh' content='1;url=index.php?p=request_barang'>";
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
                      <i class="fas fa-cart-plus"></i>
                    </span>
                    <span class="icon text-white-50">
                      Pesan Item
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
        $date               = trim($_POST['hari_ini']);
        $_SESSION['date']   = $date;
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=request_barang'>";
      }
      
      ?>