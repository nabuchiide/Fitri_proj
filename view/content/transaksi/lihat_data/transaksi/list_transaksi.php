    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-list" aria-hidden="true"></i>    
           Lihat Daftar Transaksi
        </h1>
    </div>
    <hr class ="sidebar-diver"></hr>
<div class="col">
      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Seluruh Transaksi</h6>
            </div>
            <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Order</th>
                                    <th>Nama Suplier</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Tanggal Penerimaan</th>
                                    <th>Tanggal Pelunasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if ($permintaan_barang->tampil()!=false) {
                                        $no = 1;
                                        $empty_date = '0000-00-00';
                                        foreach ($permintaan_barang->tampil() as $key) {
                                            ?>
                                            <tr>
                                                <form action="" method="post">
                                                    <td><?php echo $no++; ?><input type="hidden" name="id_order" value="<?php echo $key['id_order']?>"></td>
                                                    <td><?php echo $key['id_order']?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($key['tanggal'])); ?></td>
                                                    <td><?php if($empty_date == $key['tanggal_pembelian']){echo "Proses Pembelian";}else{echo date('d/m/Y', strtotime($key['tanggal_pembelian'])); }?></td>
                                                    <td><?php if($empty_date == $key['tanggal_penerimaan']){echo "Proses Pengiriman";}else{echo date('d/m/Y', strtotime($key['tanggal_penerimaan'])); }?></td>
                                                    <td><?php if($empty_date == $key['tanggal_pelunasan']){echo "Proses Pelunasan";}else{echo date('d/m/Y', strtotime($key['tanggal_pelunasan'])); }?></td>
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
        $id_order          = trim($_POST['id_order']); ?>
    <div class="col">

        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 border-left-dark">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Detail Transaksi Barang</h6>
                    </div>
                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Order</th>
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
    ?>