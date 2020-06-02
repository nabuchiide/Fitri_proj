<?php 
    if (isset($_POST['lunasi'])) {
        $id_pembayaran          = trim($_POST['id_pembayaran']);
        $status                 = trim($_POST['status']);
        if ($status == 'Belum Lunas'){
            echo " <meta http-equiv='refresh' content='1;url=index.php?p=pelunasan&id=".$id_pembayaran."'>";
        }else{
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Transaksi sudah dilunasi </div>";
            echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_pelunasan'>";
        }
    }
  
    ?>
     <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-list" aria-hidden="true"></i>    
            Data Pelunasan
        </h1>
    </div>

<div class="col">

      <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Daftar Pelunasan</h6>
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
                                        $no = 1;
                                        $bnyk_jth = 0;
                                        foreach ($hutang->tampil() as $key) {
                                            if ($key['status'] == 'Belum Lunas') {
                                                # code...
                                                $date = strtotime(date('Y-m-d', strtotime($key['tanggal_penerimaan']))); 
                                                $Today= strtotime(date('Y-m-d'));
                                                $beda_hari = $Today - $date;
                                                $tempo_jth = floor($beda_hari/(60*60*24));
                                                $rentang_waktu = $key['akhir pembayaran'];
                                                if ($tempo_jth >= $rentang_waktu) {
                                                    $a = "<div class='alert alert-danger'><i class='fas fa-faw fa-exclamation-triangle'></i><span> Jatuh Tempo</span></div>";
                                                    $bnyk_jth++;
                                                }else {
                                                    if  ($rentang_waktu - $tempo_jth == 1) {
                                                        $a = "<div class='alert alert-danger'><i class='fas fa-faw fa-exclamation-triangle'></i><span> Jatuh Tempo Besok</span></div>";
                                                    }elseif ($rentang_waktu - $tempo_jth == 2) {
                                                        $a = "<div class='alert alert-warning'><i class='fas fa-faw fa-exclamation-triangle'></i><span> 2 Hari Lagi Jatuh Tempo</span></div>";
                                                    }elseif ($rentang_waktu - $tempo_jth == 3) {
                                                        $a = "<div class='alert alert-warning'><i class='fas fa-faw fa-exclamation-triangle'></i><span> 3 Hari Lagi Jatuh Tempo</span></div>";
                                                    }else {
                                                        $a = "<div class='alert alert-success'><i class='fas fa-faw fa-check'></i><span> Belum Jatuh Tempo</span></div>";
                                                    }
                                                }
                                            }else {
                                                $a = "<div class='alert alert-success'><i class='fas fa-faw fa-check'></i><span>Sudah Lunas</span></div>";
                                            }
                                                ?> 
                                            <tr>
                                                <form action="" method="post">
                                                    <td><?php echo $no++; ?> <input type="hidden" value="<?php echo $key['id_pembayaran']; ?>" name="id_pembayaran"> </td>
                                                    <td><?php echo $key['nomor_faktur'];?></td>
                                                    <td><?php echo $key['no_surat_jalan']; ?> <input type="hidden" value="<?php echo $key['status']; ?>" name="status"></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td><?php if ($key['status'] == "Belum Lunas") {
                                                        echo "Proses verifikasi";
                                                    } else { echo date('d/m/Y', strtotime($key['tanggal_pelunasan'])); }?></td>
                                                    <td>Rp <?php echo number_format($key['total_transaksi'],2); ?></td>
                                                    <td><?php echo $key['status']; ?></td>
                                                    <td><?php echo $a; ?></td>
                                                    <td>
                                                        <button type="submit" name="lunasi" class="btn btn-sm btn-primary btn-custom">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-credit-card"></i>
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



        <!-- <div class="row">
        <div class="col">
          <div class="card shadow mb-4 border-left-dark" style="width: 35rem;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Data Hutang Dagang</h6>
            </div>
            <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Suplier</th>
                                    <th>Hutang</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Suplier</th>
                                    <th>Hutang</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                               
                                    if ($hutang->tampil_per_suplier()!=false) {
                                        $no = 1;
                                        foreach ($hutang->tampil_per_suplier() as $key) {
                                                ?> 
                                            <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $key['nama_suplier']; ?></td>
                                                    <td>Rp <?php echo number_format($key['total_hutang'],2); ?></td>
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
        </div> -->
