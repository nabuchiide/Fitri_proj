<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-random" aria-hidden="true"></i>    
            Data Retur Pembelian
        </h1>
    </div>
<div class="col">

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Dafar Retur Pembelian</h6>
            </div>
            <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Nama Suplier</th>
                                    <th>Total transaksi</th>
                                    <th>Status</th>
                                    <th>Detail Barang</th>
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
                                                    <td><?php echo date('d/m/Y', strtotime($key['tanggal'])); ?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td>Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                                                    <td><?php echo $key['status']; ?></td>
                                                    <td>
                                                        <button type="submit" name="detail" class="btn btn-sm btn-link btn-custom">
                                                            <span>
                                                            <i class="fas fa-tasks"></i>
                                                            </span>
                                                            <span>
                                                            Detail Retur
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
        $id_retur          = trim($_POST['id_retur']); 
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_detail_r&id=".$id_retur."'>";
    }
  
    ?>