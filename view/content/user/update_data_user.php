<?php 

  $id_user = $_GET['id_user'];
  $user->detail($id_user);

  if (isset($_POST['update_user'])) {
    // mengambil data dari form
    $nama_user      = trim(ucwords($_POST['nama_user']));
    $nomor_telepon  = trim(ucwords($_POST['telepon_user']));

    $level          = trim(ucwords($_POST['level']));

    $user->edit($id_user, $nama_user, $nomor_telepon, $level);
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=user_akun'>";
  }
  ?>
<div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h2 mb-0 text-gray-800">
        <i class="fa fa-user" aria-hidden="true"></i>    
            User
        </h1>
</div>
    <hr class ="sidebar-diver"></hr>
      <div class ="col">
        <div class="row justify-content-center mb-4 align-items-center">
            <div class="col">
              <div class="card shadow mb-4 border-left-secondary">
                <div class="card-body">
                    <h5 class="card-title">Edit Data User</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id User</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $user->id_user;?>" name="id_user" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="nama_user" value="<?php echo $user->nama_user; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="telepon_user" value="<?php echo $user->nomor_telepon; ?>"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Level</label>
                            <div class="col-sm-8">
                            <select name="level" class="form-control">
                              <option value="">--Silahkan Pilih--</option>
                              <option value="admin" <?php if($user->level == 'Admin') {echo "selected";}?>>Admin</option>
                              <option value="kepala gudang" <?php if($user->level == 'Kepala Gudang') {echo "selected";}?>>Kepala Gudang</option>
                              <option value="keuangan" <?php if($user->level == 'Keuangan') {echo "selected";}?>>Keuangan</option>
                            </select>
                            </div>
                        </div>
                      </p>
                        <button type="submit" name="update_user" class="btn btn-sm btn-primary btn-custom">
                          <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                          </span>
                          <span class="text">Simpan</span>
                        </button>
                        <a href="index.php?p=user_akun" class="btn btn-sm btn-secondary btn-custom";>
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