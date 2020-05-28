<?php 
  
  if (isset($_POST['simpan_katalog'])) {
    // mengambil data dari form
    $id_barang        = trim($_POST['id_barang']);
    $id_suplier        = trim($_POST['id_suplier']);

    $katalog->simpan($id_barang, $id_suplier);
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=katalog'>";
  }
  ?>
<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-bars" aria-hidden="true"></i>    
            Katalog
        </h1>
</div>
    <hr class ="sidebar-diver"></hr>

    <div class="row justify-content-center mb-4 align-items-center">
        <div class="col-xl-1"></div>
        <div class="col-lg-7">
            <div class="card shadow mb-4 border-left-dark " style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">Data Katalog</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col-sm-8">
                            <select class="custom-select" id="" required name="id_barang" data-live-search="true">
                                <option value="">--Silahkan pilih--</option>
                            <?php
                            foreach($barang->tampil_barang_keseluruhan() as $bar){
                            ?>
                                <option value="<?= $bar['id_barang'];?>"><?= $bar['nama_barang']?></option>
                            <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nama Suplier</label>
                            <div class="col-sm-8">
                            <select class="custom-select" id="" required name="id_suplier" data-live-search="true">
                                <option value="">--Silahkan pilih--</option>
                            <?php
                            foreach($suplier->tampil() as $sup){
                            ?>
                                <option value="<?= $sup['id_suplier'];?>"><?= $sup['nama_suplier']?></option>
                            <?php } ?>
                            </select>
                            </div>
                        </div>
                      </p>
                        <button type="submit" name="simpan_katalog" class="btn btn-sm btn-primary btn-custom">
                          <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                          </span>
                          <span class="text">Simpan</span>
                        </button>
                        <a href="index.php?p=katalog" class="btn btn-sm btn-secondary btn-custom" onClick="return confirm('semua data yang diisikan akan hilang!');">
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
              <h6 class="m-0 font-weight-bold">Data Katalog</h6>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Suplier</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          if ($katalog->tampil() != False) {
                            $no =1;
                            foreach($katalog->tampil() as $katalog_dat){
                              ?>
                            <tr>
                            <td><?php echo $no++ ;?></td>
                            <td><?php echo $katalog_dat['nama_suplier'] ;?></td>
                            <td><?php echo $katalog_dat['nama_barang'] ;?></td>
                            <td><?php echo $katalog_dat['harga_barang'] ;?></td>
                            <td>
                                <a href="?p=update_data_katalog&id_barang=<?php echo $katalog_dat['id_barang']; ?>">
                                  <button type="submit" name="edit_suplier" class="btn btn-sm btn-primary btn-custom">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-pen"></i>
                                    </span>
                                  </button>
                                </a>
                                <a href="?p=hapus_data_katalog&id_barang=<?php echo $katalog_dat['id_barang']; ?>">
                                  <button name="hapus_suplier" class="btn btn-sm btn-danger btn-custom "  onClick="return confirm('Yakin Akan Menghapus Data?');">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-trash"></i>
                                    </span>
                                  </button>
                                </a>
                            </td>
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

  <Script>
    $(document).ready(function() {
      $('#dataSuplier').DataTable();
    });
  </Script>