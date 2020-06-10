<?php 
  // $id_suplier, $nama_suplier, $nomor_telepon, $alamat
  // id_suplier
  $id_suplier = $_GET['id_suplier'];
  $suplier->detail($id_suplier);

  if (isset($_POST['update_suplier'])) {
    // mengambil data dari form
    $nama_suplier     = trim(ucwords($_POST['nama_suplier']));
    $nomor_telepon  = trim(ucwords($_POST['nomor_telepon']));
    $alamat   = trim(ucwords($_POST['alamat']));

    $suplier->edit($id_suplier, $nama_suplier, $nomor_telepon, $alamat);
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
      <div class ="col">
        <div class="row justify-content-center mb-4 align-items-center">
		<div class="col-xl-2"></div>
            <div class="col-lg-7">
              <div class="card shadow mb-4 border-left-dark"style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Suplier</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id Suplier</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $id_suplier; ?>" name="id_suplier" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nama Suplier</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="nama_suplier" value="<?php echo $suplier->nama_suplier; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="nomor_telepon" value="<?php echo $suplier->nomor_telepon; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" id="validationTextarea" name="alamat" required><?php echo $suplier->alamat; ?></textarea>
                            </div>
                        </div>
                    </p>
                    <button type="submit" name="update_suplier" class="btn btn-sm btn-primary btn-custom">
                      <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                      </span>
                      <span class="text">Simpan</span>
                    </button>
                    <a href="index.php?p=suplayer" class="btn btn-sm btn-secondary btn-custom">
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
      </div>