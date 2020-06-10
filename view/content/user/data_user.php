<?php 
  
  if (isset($_POST['simpan_user'])) {
    // mengambil data dari form
    $id_user        = trim($_POST['Id_user']);
    $nama_user      = trim(ucwords($_POST['nama_user']));
    $nomor_telepon  = trim(ucwords($_POST['telepon_user']));
    $password       = trim(ucwords($_POST['password_user']));
    // $password      = md5($_POST['password_user']);
    $level          = trim(ucwords($_POST['level']));

    $user ->simpan($id_user, $nama_user, $nomor_telepon, $password, $level);
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

    <div class="row justify-content-center mb-4 align-items-center">
        <div class="col-xl-2"></div>
        <div class="col-lg-7">
            <div class="card shadow mb-4 border-left-dark " style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data User</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                        <?php
                          $Id = $user->id_terakhir();
                          ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Id User</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value ="<?php echo $Id; ?>" name="Id_user" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nama User</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="nama_user" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="" name="telepon_user" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" id="" name="password_user" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Level</label>
                            <div class="col-sm-8">
                            <select name="level" class="form-control" required>
                              <option value="">--Silahkan Pilih--</option>
                              <option value="Admin">Admin</option>
                              <option value="Kepala Gudang">Kepala Gudang</option>
                              <option value="Keuangan">Keuangan</option>
                            </select>
                            </div>
                        </div>
                      </p>
                        <button type="submit" name="simpan_user" class="btn btn-sm btn-primary btn-custom">
                          <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                          </span>
                          <span class="text">Simpan</span>
                        </button>
                        <a href="index.php?p=user_akun" class="btn btn-sm btn-secondary btn-custom" onClick="return confirm('semua data yang diisikan akan hilang!');">
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
              <h6 class="m-0 font-weight-bold">Data User</h6>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Id User</th>
                          <th>Nama User</th>
                          <th>Nomor Telepon</th>
                          <th>Level</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          if ($user->tampil() != False) {
                            $no =1;
                            foreach($user->tampil() as $data_user){
                              ?>
                            <tr>
                            <td><?php echo $no++ ;?></td>
                            <td><?php echo $data_user['id_user'] ;?></td>
                            <td><?php echo $data_user['nama_user'] ;?></td>
                            <td><?php echo $data_user['nomor_telepon'] ;?></td>
                            <td><?php echo $data_user['level'] ;?></td>
                            <td>
                                <a href="?p=update_data_user&id_user=<?php echo $data_user['id_user']; ?>">
                                  <button type="submit" name="edit_suplier" class="btn btn-sm btn-primary btn-custom">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-pen"></i>
                                    </span>
                                  </button>
                                </a>
                                <a href="?p=hapus_data_user&id_user=<?php echo  $data_user['id_user']; ?>">
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