    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-random" aria-hidden="true"></i>    
            Laporan Retur Pembelian
        </h1>
    </div>
    <hr class ="sidebar-diver"></hr>
<div class="col">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"  method="post">
                <div class="input-group">
                    <input type="date" class="form-control bg-light border-0 small" name="car">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="cari">
                        <i class="fas fa-print fa-sm"></i>
                    </button>
                    </div>
                </div>
            </form>
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <a href="content/dokumentasi/laporan_retur.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Seluruh Laporan</a>
    </div>

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Retur Pembelian</h6>
            </div>
            <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Id Order</th>
                                    <th>Nama Suplier</th>
                                    <th>Tanggal</th>
                                    <th>Total Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                    if ($retur->tampil_join_order()!=false) {
                                        $no = 1;
                                        foreach ($retur->tampil_join_order() as $key) {
                                            ?>
                                            <tr>
                                                <form action="" method="post">
                                                    <td><?php echo $no++; ?>
                                                        <input type="hidden" value="<?php echo $key['id_retur']; ?>" name="id_retur">
                                                    </td>
                                                    <td><?php echo $key['id_order'];?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($key['tanggal'])); ?></td>
                                                    <td>Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                                                      <td>
                                                        <button type="submit" name="detail" class="btn btn-sm btn-link btn-custom">
                                                            <span class="icon">
                                                            <i class="fas fa-tasks"></i>
                                                            </span>
                                                            <span class="icon">Detail </span>
                                                        </button>
                                                    </td>
                                                </form>
                                            </tr>
                                <?php
                                        }
                                    }
                                    ?>
                                    
                            </tbody>
                           
                        </table>
                    </div>
            </div>
              </div>
            </div>
          </div>
    </div>
<?php 
    if (isset($_POST['detail'])) {
        $id_retur          = trim($_POST['id_retur']);
        $retur->detail($id_retur);
        $permintaan_barang->detil($retur->id_order);
        ?>
   <div class="col">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <a href="content/dokumentasi/laporan_detail_retur.php?id=<?php echo $id_retur;?>" target= "_blank"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Detail</a>
    </div>
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Detail Laporan Retur Pembelian</h6>
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
                            <td><?php echo $no++; ?><input type="hidden" name="detil_ret_id" value="<?php echo $key['detil_ret_id'] ;?>"></td>
                            <td><?php echo $key['nama_barang']; ?></td>
							<td><?php echo $key['jumlah'];?></td>
                            <td>Rp <?php echo number_format($key['harga_transaksi'],2); ?></td>
                            <td>Rp <?php echo number_format($key['jumlah'] * $key['harga_transaksi'],2);?></td>
                            </form>
                          </tr>
                            <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                      </tbody>
                      <?php } 
                    } ?>
                      <tfoot>
                        <tr>
                            <th colspan="4" align="right">Total transaksi</th>
                            <th colspan ="2">Rp <?php echo number_format($total,2); ?></th>
                        </tr>
                      </tfoot>
                </table>
              </div>
                <div class="row">
                <div class="col-sm-10">
                    <button type="submit" name="refrehs" class="btn btn-sm btn-link btn-custom">
                        <span class="icon text-white-50">
                        <i class="fas fa-refresh"></i>
                        </span>
                        <span> >> Sembunyikan Detail</span>
                    </button>
                </div>
                
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php    }
    if (isset($_POST['refrehs'])) {
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=list_retur'>";
    }
    if (isset($_POST['cari'])) {
      $cari = trim(ucwords($_POST['car']));
      echo " <meta http-equiv='refresh' content='1;url=content/dokumentasi/laporan_retur.php?src=".$cari."'>";
    }
    ?>