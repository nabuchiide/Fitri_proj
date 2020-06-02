<?php 
  if (isset($_POST['order'])) {
      $detil_cart_id = $_POST['id_bar'];
      echo $detil_cart_id;
      $jumlah     = trim($_POST['jumlah']);
      $jumlah_crt = $jumlah;
      // 
      foreach($detail_permintaan->tampil_detail_order($detil_cart_id) as $key){
      if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "item_id");
          if (!in_array($detil_cart_id, $item_array_id)) {
            $count = count($_SESSION['cart']);
            $item_array= array(
              'item_id' =>  $key['detil_cart_id'],
              'item_nama' => $key['nama_barang'],
              'item_harga' => $key['harga_transaksi'],
              'item_jumlah' => $jumlah_crt,
            );
            $_SESSION["cart"][$count] = $item_array;
            echo " <meta http-equiv='refresh' content='1;url=index.php?p=retur_detail'>";
            }else {
            echo " <meta http-equiv='refresh' content='1;url=index.php?p=retur_detail'>";
              echo '<script>alert("Item sudah ada di dalam list pemesanan")</script>';
              }
          }else {
            $item_array= array(
              'item_id' =>  $key['detil_cart_id'],
              'item_nama' => $key['nama_barang'],
              'item_harga' => $key['harga_transaksi'],
              'item_jumlah' => $jumlah_crt,
            );
            $_SESSION["cart"][0] = $item_array;
          }
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=retur_detail'>";
    }
  }
  if(isset($_POST['kosong'])){
	  if(isset($_SESSION["cart"])){
		unset($_SESSION['date']);
		unset($_SESSION['total_belanja']);
		unset($_SESSION['cart']);
		unset($_SESSION['Id_ret']);
		unset($_SESSION['Id_order']);
	  }else{
		unset($_SESSION['Id_ret']);
		unset($_SESSION['Id_order']);
	  }
	  echo " <meta http-equiv='refresh' content='1;url=index.php?p=permintaan_retur'>";
  }
  ?>
<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-random" aria-hidden="true"></i>    
           Permintaan Retur Barang
        </h1>
</div>
    <hr class ="sidebar-diver"></hr>

    <div class="row justify-content-center mb-4 align-items-center">
        <div class="col-xl-1"></div>
        <div class="col-lg-7">
            <div class="card shadow mb-4 border-left-dark " style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                    <?php
                          $Id = $retur->id_terakhir();
                          ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Retur</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $Id; ?>" name="Id_retur" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Order</label>
                            <div class="col-sm-8">
                            <select class="custom-select" id="" name="Id_req" data-live-search="true">
                                <option value="">--Silahkan pilih--</option>
                            <?php
                            $status = "dipesan";
                            $status1 = "dibeli";
                            foreach($permintaan_barang->tampil_selain2($status, $status1) as $key){ ?>
                            <?php if (!isset($_SESSION['Id_order'])) {?>
                              <option value="<?= $key['id_order'];?>"><?= $key['id_order']." | | ".$key['nama_suplier']?></option>
                            <?php }else { ?>
                                <option value="<?= $key['id_order'];?>" <?php if($_SESSION['Id_order'] == $key['id_order']){echo "selected";}else{echo "disabled";}?>><?= $key['id_order']." | | ".$key['nama_suplier']?></option>
                            <?php }?>
                            <?php }?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-5">
                            <button type="cari" name="cari" class="btn btn-sm btn-primary btn-custom">
                                <span class="icon text-white-50">
                                    <i class="fas fa-search"></i>
                                </span>
                                <span class="text">Cari Data</span>
                            </button>
                            </div>
							<div class="col-sm-3">
                            <button type="cari" name="kosong" class="btn btn-sm btn-danger btn-custom">
                                <span class="icon text-white-50">
                                    <i class="fas fa-retweet"></i>
                                </span>
                                <span class="text">Refresh</span>
                            </button>
                            </div>
                        </div>
                      </p>
                    </form>
                </div>
              </div>
        </div>
    </div>
    <hr class ="sidebar-diver"></hr>
    <div class="col">
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Barang</h6>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        if (isset($_POST['cari'])){
                          $Id_req          = trim($_POST['Id_req']);
                          $Id_ret           = trim($_POST['Id_retur']);
                          $_SESSION['Id_ret']  = $Id_ret;
                          $_SESSION['Id_order'] = $Id_req;

                          $no =1;
                          if ($detail_permintaan->tampil_order($Id_req)  != False){
                            foreach($detail_permintaan->tampil_order($Id_req) as $key){
                              ?>
                            <tr>
                            <form action="" method="post">
                            <td><?php echo $no++ ;?><input type="hidden" value="<?php echo $key['detil_cart_id']; ?>" name="id_bar"></td>
                            <td><?php echo $key['nama_barang'] ;?></td>
                            <td>
                            <input type="number" max ="<?php echo $key['jumlah']?>" class="form-control"  name="jumlah" placeholder="Harus Kurang dari -<?php echo $key['jumlah']?>"></td>
                            <td>
                              <button type="submit" name="order" class="btn btn-sm btn-primary btn-custom" >
                                <span class="icon text-white-50">
                                  <i class="fas fa-random"></i>
                                </span>
                                <span class="icon text-white-50">
                                retur
                                </span>
                              </button>
                            </td>
                          </form>
                          </tr>
                        <?php
                            }
                          }else {
                            echo "<script>
                            alert('data tidak ada!');
                            </script>";
                          }
                        }
                      ?>
                      </tbody>
                    </table>
              </div>
            </div>
              </div>
              <a href="?p=retur_detail">
                <button type="submit" name="order" class="btn btn-sm btn-primary btn-custom">
                  <span class="icon text-white-50">
                    <i class="fas fa-list"></i>
                  </span>
                  <span class="icon text-white-50">
                    Daftar retur
                  </span>
                </button>
              </a>
        </div>
      </div>
    </div>
<hr>
  <Script>
    $(document).ready(function() {
      $('#dataSuplier').DataTable();
    });
  </Script>