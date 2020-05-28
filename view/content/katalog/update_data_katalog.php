<?php 
  // $id_suplier, $nama_suplier, $nomor_telepon, $alamat
  // id_suplier
  $id_barang = $_GET['id_barang'];
  $katalog->detail($id_barang);

  if (isset($_POST['update_katalog'])) {
    // mengambil data dari form
    $id_barang          = trim($_POST['id_barang']);
    $id_suplier         = trim($_POST['id_suplier']);

    // echo $id_barang."<br>";
    // echo $id_suplier."<br>";
    $katalog->edit($id_barang, $id_suplier);
    echo " <meta http-equiv='refresh' content='1;url=index.php?p=katalog'>";
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
            <div class="col">
              <div class="card shadow mb-4 border-left-dark">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Katalog</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Barang</label>
                            <div class="col-sm-8">
                            <select class="custom-select" id="" required name="id_barang" data-live-search="true">
                                <option value="">--Silahkan pilih--</option>
                            <?php
                            foreach($barang->tampil_barang_keseluruhan() as $bar){
                            ?>
                                <option value="<?= $bar['id_barang'];?>"<?php if ($katalog->id_barang == $bar['id_barang']) {echo "selected";}?> ><?= $bar['nama_barang']?></option>
                            <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Suplier</label>
                            <div class="col-sm-8">
                            <select class="custom-select" id="" required name="id_suplier" data-live-search="true">
                                <option value="">--Silahkan pilih--</option>
                            <?php
                            foreach($suplier->tampil() as $sup){
                            ?>
                                <option value="<?= $sup['id_suplier'];?>"<?php if ($katalog->id_suplier == $sup['id_suplier']) {echo "selected";}?> ><?= $sup['nama_suplier']?></option>
                            <?php } ?>
                            </select>
                            </div>
                        </div>
                      </p>
                        <button type="submit" name="update_katalog" class="btn btn-sm btn-primary btn-custom">
                          <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                          </span>
                          <span class="text">Simpan</span>
                        </button>
                        <a href="index.php?p=katalog" class="btn btn-sm btn-secondary btn-custom">
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