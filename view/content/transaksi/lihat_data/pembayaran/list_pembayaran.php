    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-list" aria-hidden="true"></i>    
            Laporan Pembayaran
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
                    <i class="fas fa-search fa-sm"></i>
                </button>
                </div>
            </div>
        </form>
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <a href="content/dokumentasi/laporan_pembayaran.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Seluruh Laporan</a>
    </div>

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Seluruh Pembayaran</h6>
            </div>
            <div class="card-body" >
            <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>No Surat Jalan</th>
                                    <th>Tanggal Penerimaan</th>
                                    <th>Nama Suplier</th>
                                    <th>Total transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $status = "Porses Pelunasan";
                                $status1 = "barang masuk";
                                    if ($permintaan_barang->tampil_status($status, $status1)!=false) {
                                        $no = 1;
                                        foreach ($permintaan_barang->tampil_status($status, $status1) as $key) {
                                            ?>
                                            <tr>
                                                <form action="" method="post">
                                                    <td><?php echo $no++; ?>
                                                        <input type="hidden" value="<?php echo $key['id_order']; ?>" name="id_order">
                                                    </td>
                                                    <td><?php echo $key['nomor_faktur']?></td>
                                                    <td><?php echo $key['no_surat_jalan'];?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($key['tanggal_penerimaan'])); ?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td>Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                                                    <td>
                                                        <button type="submit" name="detail" class="btn btn-sm btn-link btn-custom">
                                                            <span>
                                                            <i class="fas fa-tasks"></i>
                                                            </span>
                                                            <span>
                                                            
                                                            </span>
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
        $id_order          = trim($_POST['id_order']);
        $permintaan_barang->detil($id_order)?> 
        <div class="col">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <a href="content/dokumentasi/laporan_detail_transaksi.php?id=<?php echo $id_order;?>&&type=pembayaran" target= "_blank"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Detail</a>
        </div>

        <div class="row">
            <div class="col">
            
                <div class="card shadow mb-4 border-left-dark">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Detail Pembayaran Barang</h6>
                    </div>
                    <div class="card-body" >
                    <p>
                <table width = "50%">
                  <tr>
                    <td>Id Permintaan</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->id_order;?></td>
                  </tr>
                  <tr>
                    <td>No Surat Jalan</td>
                    <td>:</td>
                    <td><?php echo $permintaan_barang->no_surat_jalan; ?></td>
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
                </table>
              </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Total Sub Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if ($detail_permintaan->tampil_order($id_order)!=false) {
                                        $no = 1;
                                        $total=0;
                                        foreach ($detail_permintaan->tampil_order($id_order) as $key) {
                                        ?>
                                        <tr>
                                            <form action="" method="post">
                                            <td><?php echo $no++; ?><input type="hidden" name="id_order" value="<?php echo $key['id_order']?>"></td>
                                            <td><?php echo $key['nama_barang']; ?></td>
                                            <td><?php echo number_format($key['harga_transaksi'],2);?></td>
                                            <td><?php echo $key['jumlah']; ?></td>
                                            <td>Rp <?php echo number_format($key['harga_transaksi'] * $key['jumlah'], 2);?></td>
                                            </form>
                                        </tr>
                                        <?php $total = $total + ($key['jumlah'] * $key['harga_transaksi']);?>
                                        <?php
                                        }
                                    } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="3" align="right">Total transaksi</th>
                                    <th colspan ="2">Rp <?php echo number_format($total,2); ?></th>
                                </tr>
                                </tfoot>

                            </table>
                            <form action="" method="post">
                            <button type="submit" name="refrehs" class="btn btn-sm btn-link btn-custom">
                                <span class="icon text-white-50">
                                <i class="fas fa-refresh"></i>
                                </span>
                                <span> >> Sembunyikan Detail</span>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php    }
    if (isset($_POST['refrehs'])) {
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=list_pembayaran'>";
    }
    if (isset($_POST['cari'])) {
        $cari = trim(ucwords($_POST['car']));
        echo " <meta http-equiv='refresh' content='1;url=content/dokumentasi/laporan_pembayaran.php?src=".$cari."'>";
    }
    ?>