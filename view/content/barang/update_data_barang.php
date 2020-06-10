    <div class="d-sm-flex align-items-center justify-content-center mb-4">
          <h1 class="h2 mb-0 text-gray-800">
          <i class="fa fa-cube" aria-hidden="true"></i>    
              Barang
          </h1>
    </div>
    <hr class ="sidebar-diver"></hr>
    
    <?php 
              if (isset($_GET['id_barang'])){
                $id_barang = $_GET['id_barang'];
                $barang->detail_barang($id_barang);

                if (isset($_POST['simpan_barang'])) {
                  $nama_barang      = trim(ucwords($_POST['nama_barang']));
                  $id_jenis_barang  = trim(ucwords($_POST['jenis_barang']));
                  $harga_barang     = trim(ucwords($_POST['harga_barang']));
                  $jumlah_barang    = trim(ucwords($_POST['jumlah_barang']));
                  $id_satuan        = trim(ucwords($_POST['satuan_barang']));
                  
                  $error = array();
                  if (isset($error)) {
                    foreach ($error as $key => $value) {
                      echo $values;
                    }
                  }
                  if (count($error) == 0) {
                    $barang->edit_barang($id_barang, $nama_barang, $id_jenis_barang, $harga_barang, $jumlah_barang, $id_satuan);
                    $barang->detail_barang($id_barang);
                    echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_barang'>";
                  }
                }
                ?>
          <div class ="col">
            <div class="row justify-content-satart mb-4 align-items-center">
			<div class="col-xl-3"></div>
              <div class="col-lg-7">
                  <div class="card shadow mb-4 border-left-dark"style="width: 45rem;">
                      <div class="card-body">
                          <h5 class="card-title">Edit Data Barang</h5>
                          <h6 class="card-subtitle mb-2 text-muted"></h6>
                          <p class="card-text">
                          <form action="" method="post" class="form-horizontal">
                              <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Id Barang</label>
                                  <div class="col-sm-8">
                                  <input type="text" class="form-control" id="" value ="<?php echo $id_barang ?>" readonly name="id_barang">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Nama Barang</label>
                                  <div class="col-sm-8">
                                  <input type="text" class="form-control" id="" name="nama_barang" value="<?php echo $barang->nama_barang?>" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Jenis Barang</label>
                                  <div class="col-sm-8">
                                  <select class="custom-select" id="" required name="jenis_barang">
                                  <?php
                                  foreach($jenis_barang->tampil_jns_barang() as $ket){
                                  ?>
                                      <option value="<?= $ket['id_jenis_barang'];?>" <?php if($barang->id_jenis_barang == $ket['id_jenis_barang']){echo "selected"; }?>><?= $ket['keterangan_jenis_barang']?></option>
                                  <?php } ?>
                                  </select>
                                  </div>
                              </div>
							   <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Satuan</label>
                                  <div class="col-sm-8">
                                  <select class="custom-select" id="validationCustom04" required name="satuan_barang">
                                  <?php
                                    foreach($satuan_barang->tampil_satuan_barang() as $ket1){
                                  ?>
                                      <option value="<?= $ket1['id_satuan_barang'];?>" <?php if($barang->id_satuan == $ket1['id_satuan_barang']) {echo "selected"; }?>><?= $ket1['keterangan_satuan_barang']?></option>
                                  <?php } ?>
                                  </select>
                                  </div>
                              </div>
							   <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Jumlah</label>
                                  <div class="col-sm-8">
                                  <input type="text" class="form-control" id="" name="jumlah_barang" value="<?php echo $barang->jumlah_barang?>" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Harga</label>
                                  <div class="col-sm-8">
                                  <input type="text" class="form-control" id="" name="harga_barang" value="<?php echo $barang->harga_barang?>" required>
                                  </div>
                              </div>
                            </p>
                            <button type="submit" name="simpan_barang" class="btn btn-sm btn-primary btn-custom">
                              <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                                </span>
                              <span class="text">Simpan</span>
                            </button>
                            <a href="index.php?p=data_barang" class="btn btn-sm btn-secondary btn-custom">
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
        <?php } ?>
            
            <?php 
              if (isset($_GET['jns_br'])){
                  $id_jenis_barang =$_GET['jns_br'];
                  $jenis_barang->detail($id_jenis_barang);

                  if (isset($_POST['simpan_jenis_barang'])) {
                    $keterangan_jenis_barang = trim(ucwords($_POST['keterangan_jenis']));
                    
                    $error = array();
                      if (isset($error)){
                        foreach ($error as $key => $value) {
                          echo $value;
                        }
                      }
                      if (count($error)==0) {
                        $jenis_barang->edit($id_jenis_barang, $keterangan_jenis_barang);
                        $jenis_barang->detail($id_jenis_barang);
                        echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_barang'>";
                      }
                  }

                ?>
          <div class ="col">
            <div class="row justify-content-satart mb-4 align-items-center">
			<div class="col-xl-4"></div>
              <div class="col-lg-7">
                <div class="card shadow mb-4 border-left-dark" style ="width: 35rem;">
                  <div class="card-body">
                      <h5 class="card-title">Edit Jenis Barang</h5>
                      <h6 class="card-subtitle mb-2 text-muted"></h6>
                      <p class="card-text">
                      <form action="" method="post" class="form-horizontal">
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Id Jenis</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="" value ="<?php echo $id_jenis_barang; ?>" readonly name="Id_jenis">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="" name="keterangan_jenis" value ="<?php echo $jenis_barang->keterangan_jenis_barang?>">
                              </div>
                          </div>
                          </p>
                          <button type="submit" name="simpan_jenis_barang" class="btn btn-sm btn-primary btn-custom">
                            <span class="icon text-white-50">
                              <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                          </button>
                          <a href="index.php?p=data_barang" class="btn btn-sm btn-secondary btn-custom">
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
            <?php } ?>
              
                <?php 
                  if (isset($_GET['sat_br'])) {
                    $id_satuan_barang =$_GET['sat_br'];
                    $satuan_barang->detail($id_satuan_barang);

                    if (isset($_POST['simpan_satuan_barang'])) {
                      $keterangan_satuan_barang = trim(ucwords($_POST['keterangan_satuan']));

                      $error= array();
                      if (isset($error)) {
                        foreach ($error as $key => $value) {
                          echo $value;
                        }
                      }

                      if (count($error)==0) {
                        $satuan_barang->edit($id_satuan_barang, $keterangan_satuan_barang);
                        $satuan_barang->detail($id_satuan_barang);
                        echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_barang'>";
                      }
                    }
                    ?>
          <div class ="col">
            <div class="row justify-content-satart mb-4 align-items-center">
              <div class="col-xl-4"></div>
              <div class="col-lg-7">
                <div class="card shadow mb-4 border-left-dark" style ="width: 35rem;">
                      <div class="card-body">
                              <h5 class="card-title ">Edit Satuan Barang</h5>
                              <h6 class="card-subtitle mb-2 text-muted"></h6>
                              <p class="card-text">
                              <form action="" method="post" class="form-horizontal">
                                  <div class="form-group row">
                                      <label for="" class="col-sm-4 col-form-label">Id Satuan</label>
                                      <div class="col-sm-8">
                                      <input type="text" class="form-control" id="" value ="<?php echo $id_satuan_barang; ?>" readonly  name="Id_satuan">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                                      <div class="col-sm-8">
                                      <input type="text" class="form-control" id="" name="keterangan_satuan" value="<?php echo $satuan_barang->keterangan_satuan_barang;?>">
                                      </div>
                                  </div>
                                  </p>
                                  <button type="submit" name="simpan_satuan_barang" class="btn btn-sm btn-primary btn-custom">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                  </button>
                                  <a href="index.php?p=data_barang" class="btn btn-sm btn-secondary btn-custom">
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
                  <?php
                      }
                      ?>
    </div>
    
    <hr class ="sidebar-diver"></hr>