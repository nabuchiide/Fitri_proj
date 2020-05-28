<?php 
    if (isset($_SESSION['tanggal_pembelian'])) {
        unset($_SESSION['tanggal_pembelian']);
    }

    ?>
     <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-list" aria-hidden="true"></i>    
           Data Pembelian Barang
        </h1>
    </div>
<div class="col">

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Data Permintaan dan Pembelian Barang</h6>
            </div>
            <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Nama Suplier</th>
                                    <th>Total transaksi</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Status</th>
                                    <th>Detail Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $status = "dipesan";
                                $status1 ="dibeli";
                                    if ($permintaan_barang->tampil_status($status, $status1)!=false) {
                                        $no = 1;
                                        foreach ($permintaan_barang->tampil_status($status, $status1) as $key) {
                                            ?>
                                            <tr>
                                                <form action="" method="post">
                                                    <td><?php echo $no++; ?>
                                                        <input type="hidden" value="<?php echo $key['id_order']; ?>" name="id_order">
                                                    </td>
                                                    <td><?php echo date('d/m/Y', strtotime($key['tanggal'])); ?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td>Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                                                    <td><?php if ($key['status'] == "dipesan") {
                                                        echo "Proses verifikasi";
                                                    } else { echo date('d/m/Y', strtotime($key['tanggal_pembelian'])); }?></td>
                                                    <td><?php echo $key['status']; ?></td>
                                                    <td>
                                                        <button type="submit" name="detail" class="btn btn-sm btn-link btn-custom">
                                                            <span>
                                                            <i class="fas fa-tasks"></i>
                                                            </span>
                                                            <span>
                                                            Detail
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
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_detail_p&id=".$id_order."'>";
    }
    ?>