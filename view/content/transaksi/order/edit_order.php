<?php 
    if (!isset($_SESSION['suplier'])) {
      echo "<meta http-equiv='refresh' content='1;url=index.php?p=request_barang'>";
    }
    if (isset($_POST['edit'])) {
        $jumlah     = trim($_POST['jumlah']);
        $id_barang = trim($_POST['id_bar']);
        // echo $jumlah."<br>";
        // echo $id_barang."<br>";
        foreach ($_SESSION['cart'] as $keys => $value) {
          if ($value['item_id']== $id_barang) {
            $_SESSION['cart'][$keys]['item_jumlah'] = $jumlah;
            echo "<meta http-equiv='refresh' content='1;url=index.php?p=edt_order'>";
             }
        }
    }

    if (isset($_POST['selesai'])) {
      echo "<div class='alert alert-success'><span class='fa fa-check'> Data berhasil diperbaharui</span></div>";
      echo "<meta http-equiv='refresh' content='1;url=index.php?p=order'>";
    }
    ?>
    <div class="col">
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">List Permintaan</h6>
            </div>
            <div class="card-body" >
              <div class="form-group row">
                <label for="" class="col-sm-1 col-form-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="hari_ini" value="<?php echo $_SESSION['date'];?>" required>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Barang</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if (!empty($_SESSION['cart'])) {
                        $no = 1;
                        $total= 0;
                        foreach ($_SESSION['cart'] as $keys => $values) {
                        ?>
                        <tr>
                        <form action="" method="post">
                          <td><?php echo $no++; ?><input type="hidden" value="<?php echo $values["item_id"]; ?>" name="id_bar"></td>
                          <td><?php echo $values["item_nama"];?></td>
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
                                <span class="icon text-white-50">
                                Perbaharui
                                </span>
                            </button>
                          </td>
                        </form>
                        </tr>
                        <?php
                            $total = $total + ($values["item_jumlah"] * $values["item_harga"]);
                            }?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="4" align="right">Total Belanja</th>
                            <th>Rp <?php echo number_format($total,2); ?></th>
                            <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <?php 
                        $_SESSION['total_belanja'] = $total;
                          } else {
                        echo "<meta http-equiv='refresh' content='1;url=index.php?p=request_barang'>";
                      }?> 
                </table>
              </div>
                <div class="col-sm-2">
                <form action="" method="post">
                  <button type="submit" name="selesai" class="btn btn-sm btn-success btn-custom">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="icon text-white-50">
                      Selesai
                    </span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>