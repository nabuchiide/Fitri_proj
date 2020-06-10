<?php 
  if (isset($_POST['order'])) {
      $id_barang = $_POST['id_bar'];
      $jumlah     = trim($_POST['jumlah']);
      $jumlah_crt = $jumlah;
      $katalog->tampil_keranjang($id_barang);
      if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "item_id");
          if (!in_array($id_barang, $item_array_id)) {
            $count = count($_SESSION['cart']);
            $item_array= array(
              'item_id' => $katalog->id_barang,
              'item_nama' => $katalog->nama_barang,
              'item_harga' => $katalog->harga_barang,
              'item_jumlah' => $jumlah_crt,
              'item_id_sup'  =>$katalog->id_suplier,
              'item_nama_sup' => $katalog->nama_suplier
            );
            $_SESSION["cart"][$count] = $item_array;
            echo " <meta http-equiv='refresh' content='1;url=index.php?p=order'>";
            }else {
            echo " <meta http-equiv='refresh' content='1;url=index.php?p=order'>";
              echo '<script>alert("Item sudah ada di dalam list pemesanan")</script>';
              }
          }else {
            $item_array= array(
              'item_id' => $katalog->id_barang,
              'item_nama' => $katalog->nama_barang,
              'item_harga' => $katalog->harga_barang,
              'item_jumlah' => $jumlah_crt,
              'item_id_sup'  =>$katalog->id_suplier,
              'item_nama_sup' => $katalog->nama_suplier
            );
            $_SESSION["cart"][0] = $item_array;
          }
     echo " <meta http-equiv='refresh' content='1;url=index.php?p=order'>";
  }
  if(isset($_POST['kosong'])){
	  if(isset($_SESSION["cart"])){
		unset($_SESSION['date']);
		unset($_SESSION['total_belanja']);
		unset($_SESSION['cart']);
		unset($_SESSION['suplier']);
		unset($_SESSION['id_order']);
	  }else{
		unset($_SESSION['suplier']);
		unset($_SESSION['id_order']);
	  }
	  echo " <meta http-equiv='refresh' content='1;url=index.php?p=request_barang'>";
  }
  ?>
<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-bars" aria-hidden="true"></i>    
           Permintaan Barang
        </h1>
</div>
    <hr class ="sidebar-diver"></hr>

    <div class="row justify-content-center mb-4 align-items-center">
        <div class="col-xl-2"></div>
        <div class="col-lg-7">
            <div class="card shadow mb-4 border-left-dark" style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                    <?php
                          $Id = $permintaan_barang->id_terakhir();
                          ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Order</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $Id; ?>" name="Id_order" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Suplier</label>
                            <div class="col-sm-8">
                            <select class="custom-select" id="" required name="Id_suplier" data-live-search="true">
                                <option value="">--Silahkan pilih--</option>
                            <?php
                            foreach($suplier->tampil() as $sup){
                              if (!isset($_SESSION['suplier'])) {
                               ?> <option value="<?= $sup['id_suplier'];?>"><?= $sup['nama_suplier']?></option>
                              <?php }else { ?>
                                <option value="<?= $sup['id_suplier'];?>"<?php if($_SESSION['suplier']== $sup['id_suplier']){echo "selected";} else {echo "disabled";}?>><?= $sup['nama_suplier']?></option>
                              <?php } ?>
                            <?php } ?>
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
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        if (isset($_POST['cari'])){
                          $id_suplier         = trim($_POST['Id_suplier']);
                          $Id_req           = trim($_POST['Id_order']);
                          
                          $_SESSION['suplier']  = $id_suplier;
                          $_SESSION['id_order'] = $Id_req;
                          
                          $no =1;
                          if ($katalog->tampil_permint($id_suplier)  != False){
                            foreach($katalog->tampil_permint($id_suplier) as $katalog_dat){
                              ?>
                            <tr>
                            <form action="" method="post">
                            <td><?php echo $no++ ;?><input type="hidden" value="<?php echo $katalog_dat['id_barang']; ?>" name="id_bar"></td>
                            <td><?php echo $katalog_dat['nama_barang'] ;?></td>
                            <td><?php echo $katalog_dat['harga_barang'] ;?></td>
                            <td>
                            <input type="text" class="form-control"  name="jumlah"></td>
                            <td>
                              <button type="submit" name="order" class="btn btn-sm btn-primary btn-custom" >
                                <span class="icon text-white-50">
                                  <i class="fas fa-list"></i>
                                </span>
                                <span class="icon text-white-50">
                                Pesan
                                </span>
                              </button>
                                <!-- </a> -->
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
              <a href="?p=order">
                <button type="submit" name="order" class="btn btn-sm btn-primary btn-custom">
                  <span class="icon text-white-50">
                    <i class="fas fa-list"></i>
                  </span>
                  <span class="icon text-white-50">
                    Daftar Pesan
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