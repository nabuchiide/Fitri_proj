<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-credit-card" aria-hidden="true"></i>    
            Data Pembayaran
        </h1>
    </div>
<div class="col">

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Pembayaran</h6>
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
                                    <th>Status</th>
                                    <th>Detail Barang</th>
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
                                                    <td><?php echo $key['nomor_faktur'];?></td>
                                                    <td><?php echo $key['no_surat_jalan'];?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($key['tanggal_penerimaan'])); ?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td>Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                                                    <td><?php echo $key['status']; ?></td>
                                                    <td>
                                                        <button type="submit" name="detail" class="btn btn-sm btn-link btn-custom">
                                                            <span>
                                                            <i class="fas fa-tasks"></i>
                                                            </span>
                                                            <span>
                                                            
                                                            </span>
                                                        </button>

                                                        <button type="submit" name="pembayarang" class="btn btn-sm btn-info btn-custom">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-credit-card"></i>
                                                            </span>
                                                            <span class="icon text-white-50">
                                                            
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
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=verifikasi_detail_pem&id=".$id_order."'>";
    }
    if (isset($_POST['pembayarang'])) {
        $id_order          = trim($_POST['id_order']); 
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=pembayaran&id=".$id_order."'>";
    }
  
    ?>