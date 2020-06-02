    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-list" aria-hidden="true"></i>    
            Laporan Hutang Dagang
        </h1>
    </div>
    <hr class ="sidebar-diver"></hr>
<div class="col">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"  method="post">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari data..." aria-label="Search" aria-describedby="basic-addon2" name="car">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="cari">
                        <i class="fas fa-print fa-sm"></i>
                    </button>
                    </div>
                </div>
            </form>
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <a href="content/dokumentasi/laporan_hutang_dagang.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Seluruh Laporan</a>
    </div>

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Hutang Dagang</h6>
            </div>
            <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="TabelData">
                        <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Suplier</th>
                                    <th>Hutang Dagang</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if ($hutang->tampil_per_suplier()!=false) {
                                $no = 1;
                                foreach ($hutang->tampil_per_suplier() as $key) {?> 
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $key['nama_suplier']; ?></td>
                                    <td>Rp <?php echo number_format($key['total_hutang'],2); ?></td>
                                </tr>
                                <?php } } ?>
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
        $id_order          = trim($_POST['id_order']); ?>
    <div class="col">

        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 border-left-dark">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Detail Permintaan Barang</h6>
                    </div>
                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Perminataan</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if ($detail_permintaan->tampil_order($id_order)!=false) {
                                        $no = 1;
                                        foreach ($detail_permintaan->tampil_order($id_order) as $key) {
                                        ?>
                                        <tr>
                                            <form action="" method="post">
                                            <td><?php echo $no++; ?><input type="hidden" name="id_order" value="<?php echo $key['id_order']?>"></td>
                                            <td><?php echo $key['id_order']?></td>
                                            <td><?php echo $key['nama_barang']; ?></td>
                                            <td><?php echo $key['jumlah']; ?></td>
                                            </form>
                                        </tr>
                                        <?php
                                        }
                                    } ?>
                                </tbody>
                                        
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
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=list_transaksi'>";
    }
    if (isset($_POST['cari'])) {
        $cari = trim(ucwords($_POST['car']));
        echo " <meta http-equiv='refresh' content='1;url=content/dokumentasi/laporan_hutang_dagang.php?src=".$cari."'>";
    }
    ?>