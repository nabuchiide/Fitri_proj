    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-list" aria-hidden="true"></i>    
            Laporan Pelunasan
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
        <a href="content/dokumentasi/laporan_pelunasan.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Seluruh Laporan</a>
    </div>

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Seluruh Pelunasan</h6>
            </div>
            <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>No Surat Jalan</th>
                                    <th>Nama Suplier</th>
                                    <th>Tanggal Pelunasan</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if ($hutang->tampil()!=false) {
                                        $no =1;
                                        foreach ($hutang->tampil() as $key) {
                                            if ($key['status'] == 'Belum Lunas') {
                                                # code...
                                                $date = strtotime(date('Y-m-d', strtotime($key['tanggal_penerimaan']))); 
                                                $Today= strtotime(date('Y-m-d'));
                                                $beda_hari = $Today - $date;
                                                $tempo_jth = floor($beda_hari/(60*60*24));
                                                $rentang_waktu = $key['akhir pembayaran'];
                                                if ($tempo_jth >= $rentang_waktu) {
                                                    $a = "Jatuh Tempo";
                                                }else {
                                                    if  ($rentang_waktu - $tempo_jth == 1) {
                                                        $a = "Jatuh Tempo Besok";
                                                    }elseif ($rentang_waktu - $tempo_jth == 2) {
                                                        $a = "2 Hari Lagi Jatuh Tempo";
                                                    }elseif ($rentang_waktu - $tempo_jth == 3) {
                                                        $a = "3 Hari Lagi Jatuh Tempo";
                                                    }else {
                                                        $a = "Belum Jatuh Tempo";
                                                    }
                                                }
                                            }else {
                                                $a = "Sudah Lunas";
                                            }
                                                ?> 
                                            <tr>
                                                <form action="" method="post">
                                                    <td><?php echo $no++; ?> <input type="hidden" value="<?php echo $key['id_order']; ?>" name="id_order"></td>
                                                    <td><?php echo $key['nomor_faktur']?></td>
                                                    <td><?php echo $key['no_surat_jalan']; ?> <input type="hidden" value="<?php echo $key['status']; ?>" name="status"></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td><?php if ($key['status'] == "Belum Lunas") {
                                                        echo "Proses Pelunasan";
                                                    } else { echo date('d/m/Y', strtotime($key['tanggal_pelunasan'])); }?></td>
                                                    <td>Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                                                    <td><?php echo $key['status']; ?></td>
                                                    <td><?php echo $a; ?></td>
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
        $id_order          = trim($_POST['id_order']); 
        $permintaan_barang->detil($id_order); ?>
    <div class="col">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <a href="content/dokumentasi/laporan_detail_transaksi.php?id=<?php echo $id_order;?>&&type=pelunasan" target= "_blank"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Detail</a>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 border-left-dark">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Detail Pelunasan Barang</h6>
                    </div>
                    <div class="card-body" >
                <p>
                    <table width = "50%">
                    <tr>
                        <td>Id Order</td>
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
                        <td>Nama Suplier</td>
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
                    // $_SESSION['total_transaksi'] = $total;
                    ?>
                      <tfoot>
                        <tr>
                            <th colspan="4" align="right">Total transaksi</th>
                            <th colspan ="2" align="left" >Rp <?php echo number_format($total,2); ?></th>
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
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=list_hutang'>";
    }
    if (isset($_POST['cari'])) {
        $cari = trim(ucwords($_POST['car']));
        echo " <meta http-equiv='refresh' content='1;url=content/dokumentasi/laporan_pelunasan.php?src=".$cari."'>";
    }
    ?>