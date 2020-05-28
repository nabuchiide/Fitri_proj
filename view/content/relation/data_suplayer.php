<?php 
  // $id_suplier, $nama_suplier, $nomor_telepon, $alamat
  
  if (isset($_POST['simpan_suplier'])) {
    // mengambil data dari form
    $id_suplier       = trim($_POST['id_suplier']);
    $nama_suplier     = trim(ucwords($_POST['nama_suplier']));
    $nomor_telepon  = trim(ucwords($_POST['nomor_telepon']));
    $alamat   = trim(ucwords($_POST['alamat']));

    $suplier->simpan($id_suplier, $nama_suplier, $nomor_telepon, $alamat);
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=suplayer'>";
  }
  ?>
<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-handshake" aria-hidden="true"></i>    
            Suplier
        </h1>
    </div>
    <hr class ="sidebar-diver"></hr>

    <div class="row justify-content-center mb-4 align-items-center">
        <div class="col-xl-1"></div>
        <div class="col-lg-7">
            <div class="card shadow mb-4 border-left-dark" style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Suplier</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                        <?php
                          $Id = $suplier->id_terakhir();
                          ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Suplier</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $Id; ?>" name="id_suplier" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nama Suplier</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="nama_suplier" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="nomor_telepon" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" id="validationTextarea" name="alamat" required></textarea>
                            </div>
                        </div>
                    </p>
                      <button type="submit" name="simpan_suplier" class="btn btn-sm btn-primary btn-custom">
                        <span class="icon text-white-50">
                          <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan</span>
                      </button>
                      <a href="index.php?p=suplayer" class="btn btn-sm btn-secondary btn-custom" onClick="return confirm('semua data yang diisikan akan hilang!');">
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
              <h6 class="m-0 font-weight-bold text-dark">Data Suplier</h6>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Id Suplier</th>
                          <th>Nama Suplier</th>
                          <th>Nomor Telepon</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          if ($suplier->tampil() != False) {
                            $no =1;
                            foreach($suplier->tampil() as $data_suplier){
                              ?>
                            <tr>
                            <td><?php echo $no++ ;?></td>
                            <td><?php echo $data_suplier['id_suplier'] ;?></td>
                            <td><?php echo $data_suplier['nama_suplier'] ;?></td>
                            <td><?php echo $data_suplier['nomor_telepon'] ;?></td>
                            <td><?php echo $data_suplier['alamat'] ;?></td>
                            <td>
                                <a href="?p=update_data_suplier&id_suplier=<?php echo $data_suplier['id_suplier']; ?>">
                                  <button type="submit" name="edit_suplier" class="btn btn-sm btn-primary btn-custom">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-pen"></i>
                                    </span>
                                  </button>
                                </a>
                                <a href="?p=hapus_data_suplier&id_suplier=<?php echo  $data_suplier['id_suplier']; ?>">
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