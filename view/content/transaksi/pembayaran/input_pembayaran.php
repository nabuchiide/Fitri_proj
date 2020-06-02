<?php 
  
  $id_order = $_GET['id'];
  $permintaan_barang->detil($id_order);
      if (isset($_POST['simpan'])) {
        // mengambil data dari form
        $id_pembayaran      = trim($_POST['Id_pembayaran']);
        $id_order           = trim($_POST['Id_req']);
        $tempo              = trim($_POST['tempo']);
        $status             = "Porses Pelunasan";
        $status_pembayaran  = "Belum Lunas";
        $permintaan_barang->detil($id_order);
        $nama_suplier = $permintaan_barang->nama_suplier;
        $total_hutang = $permintaan_barang->total_transaksi;
        // echo $id_pembayaran."<br>".$id_order."<br>".$tempo."<br>".$status."<br>".$status_pembayaran."<br>".$nama_suplier."<br>". $total_hutang;
        $permintaan_barang->di_beli($id_order, $status);
        $pembayaran->simpan($id_pembayaran, $id_order, $tempo, $status_pembayaran);
        if ($hutang->tampil_keseluruhan()!=false){
          foreach ($hutang->tampil_keseluruhan() as $key) {
                if ($key['nama_suplier'] == $nama_suplier) {
                  $hutang->tambah_hutang($nama_suplier, $total_hutang);
                }else{
                  $hutang->simpan($nama_suplier, $total_hutang);
                }
            }
        }else {
          $hutang->simpan($nama_suplier, $total_hutang);
        }
        
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_pembayaran'>";
      }
  ?>
<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-credit-card" aria-hidden="true"></i>    
            Pembayaran
        </h1>
    </div>
    <hr class ="sidebar-diver"></hr>

    <div class="row justify-content-center mb-4 align-items-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-left-dark " style="width: 50rem;">
                <div class="card-body">
                    <h5 class="card-title">Input Data Pembayaran</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                    <?php
                          $Id = $pembayaran->id_terakhir();
                          ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Pembayaran</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $Id;?>" name="Id_pembayaran" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Order</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="Id_req" value="<?php echo $permintaan_barang->id_order;?>"readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Jatuh Tempo</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="" name="tempo" required>
                            </div>
                            <label for="" class="col-sm-3 col-form-label">Hari</label>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Total transaksi</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="total_transaksi" value="Rp <?php echo number_format($permintaan_barang->total_transaksi,2);?>"readonly>
                            </div>
                        </div> -->
                      </p>
                        <button type="submit" name="simpan" class="btn btn-sm btn-primary btn-custom">
                          <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                          </span>
                          <span class="text">Simpan</span>
                        </button>
                        <a href="index.php?p=data_pembayaran" class="btn btn-sm btn-secondary btn-custom">
                          <span class="icon text-white-50">
                              <i class="fas fa-reply"></i>
                          </span>
                        <span class="text">Batal</span>
                      </a>
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
                <h6 class="m-0 font-weight-bold">Detail Barang Datang</h6>
            </div>
            <div class="card-body" >
              <form action="" method="post">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
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
                            <td><?php echo $key['nama_barang'];?></td>
                            <td>Rp <?php echo number_format($key['harga_transaksi'],2); ?></td>
                            <td><?php echo $key['jumlah'];?></td>
                            <td>Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2);?></td>
                            </form>
                          </tr>
                            <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                      </tbody>
                      
                      <?php } 
                    $_SESSION['total_hutang'] = $total;
                    } ?>
                      <tfoot>
                        <tr>
                            <th colspan="4" align="right">Total Transaksi</th>
                            <th colspan ="1">Rp <?php echo number_format($total,2); ?></th>
                        </tr>
                      </tfoot>
                </table>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <Script>
    $(document).ready(function() {
      $('#dataSuplier').DataTable();
    });
  </Script>