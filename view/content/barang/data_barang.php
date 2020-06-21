
    <?php
      //input data barang
    if (isset($_POST['simpan_barang'])) {
      $id_barang        = trim($_POST['Id_barang']);
      $nama_barang      = trim(ucwords($_POST['nama_barang']));
      $id_jenis_barang  = trim(ucwords($_POST['jenis_barang']));
      $harga_barang     = trim(ucwords($_POST['harga_barang']));
      $jumlah_barang    = trim(ucwords($_POST['jumlah_barang']));
      $id_satuan        = trim(ucwords($_POST['satuan_barang']));

        $barang->simpan_barang($id_barang, $nama_barang, $id_jenis_barang, $harga_barang, $jumlah_barang, $id_satuan);
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_barang'>";
    }

    //input satuan
    if (isset($_POST['simpan_satuan_barang'])) {
      $id_satuan_barang = trim($_POST['Id_satuan']);
      $keterangan_satuan_barang = trim(ucwords($_POST['keterangan_satuan']));

      $error1 = array();
      if (empty($keterangan_satuan_barang)) {
        $error1['keterangan_satuan_barang'] = 'Keterangan harus di isi ! <br>' ;
      }
      if (isset($error1)) {
        foreach ($error1 as $key => $value) {
          echo $value;
        }
      }
      if (count($error1)==0) {
        $satuan_barang->simpan($id_satuan_barang, $keterangan_satuan_barang);
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_barang'>";
      }
    }


    //input jenis barang
    if (isset($_POST['simpan_jenis_barang'])) {
      $id_jenis_barang = trim($_POST['Id_jenis']);
      $keterangan_jenis_barang = trim(ucwords($_POST['keterangan_jenis']));
      $error2 = array();
      if (empty($keterangan_jenis_barang)) {
        $error2['keterangan_jenis_barang'] = 'Keterangan harus di isi ! <br>';
      }
      if (isset($error2)) {
        foreach ($error2 as $key => $value) {
          echo $value;
        }
      }
      if (count($error2)==0) {
        $jenis_barang->simpan($id_jenis_barang, $keterangan_jenis_barang);
        echo " <meta http-equiv='refresh' content='1;url=index.php?p=data_barang'>";
      }
    }

    ?>
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
          <h1 class="h2 mb-0 text-gray-800">
          <i class="fa fa-cube" aria-hidden="true"></i>    
              Barang
          </h1>
    </div>
    <hr class ="sidebar-diver"></hr>
    <!-- data tabel -->
    <div class="col">
      <div class="row justify-content-center mb-4 align-items-center">
	  <div class="col-xl-1"></div>
          <div class="col-lg-6">
              <div class="card shadow mb-4 border-left-dark" style="width: 35rem;  height: 29rem;">
                  <div class="card-body">
                      <h5 class="card-title">Tambah Data Barang</h5>
                      <h6 class="card-subtitle mb-2 text-muted"></h6>
                      <p class="card-text">
                      <form action="" method="post" class="form-horizontal">
                        <?php
                          $Id = $barang->id_terakhir();
                          ?>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Id Barang</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="" value ="<?php echo $Id ?>" readonly name="Id_barang">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Nama Barang</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="" name="nama_barang" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Jenis Barang</label>
                              <div class="col-sm-8">
                              <select class="custom-select" id="" required name="jenis_barang" data-live-search="true" required>
                                <option value="">--Silahkan pilih--</option>
                              <?php
                              foreach($jenis_barang->tampil_jns_barang() as $ket){
                              ?>
                                  <option value="<?= $ket['id_jenis_barang'];?>"><?= $ket['keterangan_jenis_barang']?></option>
                              <?php } ?>
                              </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Satuan</label>
                              <div class="col-sm-8">
                              <select class="custom-select" id="validationCustom04" required name="satuan_barang" required>
                                <option value="">--Silahkan pilih--</option>
                                <?php
                                  foreach($satuan_barang->tampil_satuan_barang() as $ket1){
                                ?>
                                  <option value="<?= $ket1['id_satuan_barang'];?>"><?= $ket1['keterangan_satuan_barang']?></option>
                              <?php } ?>
                              </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Jumlah</label>
                              <div class="col-sm-8">
                              <input type="number" class="form-control" id="" name="jumlah_barang" min="1" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Harga</label>
                              <div class="col-sm-8">
                              <input type="number" class="form-control" id="" name="harga_barang" required>
                              </div>
                          </div>
                        </p>
                        <button type="submit" name="simpan_barang" class="btn btn-sm btn-primary btn-custom">
                          <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                            </span>
                          <span class="text">Simpan</span>
                        </button>
                        <a href="index.php?p=data_barang">
                          <button name="hapus_data_barang" class="btn btn-sm btn-secondary btn-custom "  onClick="return confirm('semua data yang diisikan akan hilang!');">
                            <span class="icon text-white-50">
                              <i class="fas fa-reply"></i>
                            </span>
                            <span class="text">Batal</span>
                          </button>
                        </a>
                      </form>
                  </div>
                </div>
          </div>
          <div class="col-lg-4">
              <div class="card shadow mb-4 border-left-dark" style="width: 25rem; height: 13rem;">
                  <div class="card-body">
                      <h5 class="card-title">Tambah Jenis Barang</h5>
                      <h6 class="card-subtitle mb-2 text-muted"></h6>
                      <p class="card-text">
                      <form action="" method="post" class="form-horizontal">
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Id Jenis</label>
                              <div class="col-sm-8">
                              <?php
                                  $Id_jenis = $jenis_barang->id_terakhir();
                                ?>
                              <input type="text" class="form-control" id="" value ="<?php echo $Id_jenis; ?>" readonly name="Id_jenis">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="" name="keterangan_jenis" required>
                              </div>
                          </div>
                          </p>
                          <button type="submit" name="simpan_jenis_barang" class="btn btn-sm btn-primary btn-custom">
                            <span class="icon text-white-50">
                              <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                          </button>
                          <a href="index.php?p=data_barang">
                          <button name="hapus_data_barang" class="btn btn-sm btn-secondary btn-custom "  onClick="return confirm('semua data yang diisikan akan hilang!');">
                            <span class="icon text-white-50">
                              <i class="fas fa-reply"></i>
                            </span>
                            <span class="text">Batal</span>
                          </button>
                        </a>
                      </form>
                  </div>
              </div>
              <div class="card shadow mb-4 border-left-dark" style="width: 25rem; height: 14rem;">
              <div class="card-body">
                      <h5 class="card-title ">Tambah Satuan Barang</h5>
                      <h6 class="card-subtitle mb-2 text-muted"></h6>
                      <p class="card-text">
                      <form action="" method="post" class="form-horizontal">
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Id Satuan</label>
                              <div class="col-sm-8">
                              <?php
                                  $Id_satuan = $satuan_barang->id_terakhir();
                                ?>
                              <input type="text" class="form-control" id="" value ="<?php echo $Id_satuan; ?>" readonly  name="Id_satuan">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="" name="keterangan_satuan" required>
                              </div>
                          </div>
                          </p>
                          <button type="submit" name="simpan_satuan_barang" class="btn btn-sm btn-primary btn-custom">
                            <span class="icon text-white-50">
                              <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                          </button>
                          <a href="index.php?p=data_barang">
                          <button name="hapus_data_barang" class="btn btn-sm btn-secondary btn-custom "  onClick="return confirm('semua data yang diisikan akan hilang!');">
                            <span class="icon text-white-50">
                              <i class="fas fa-reply"></i>
                            </span>
                            <span class="text">Batal</span>
                          </button>
                        </a>
                      </form>
                  </div>
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
              <h6 class="m-0 font-weight-bold">Data Barang</h6>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Id Barang</th>
                          <th>Nama Barang</th>
                          <th>Jenis Barang</th>
                          <th>Satuan</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          if ($barang->tampil_barang_keseluruhan() != False) {
                            $no =1;
                            foreach($barang->tampil_barang_keseluruhan() as $data_barang){
                              ?>
                            <tr>
                            <td><?php echo $no++ ;?></td>
                            <td><?php echo $data_barang['id_barang'] ;?></td>
                            <td><?php echo $data_barang['nama_barang'] ;?></td>
                            <td><?php echo $data_barang['keterangan_jenis_barang'] ;?></td>
                            <td><?php echo $data_barang['keterangan_satuan_barang'] ;?></td>
                            <td><?php echo $data_barang['jumlah_barang'] ;?></td>
                            <td><?php echo "RP ".number_format($data_barang['harga_barang']);?></td>
                            <td>
                                <a href="?p=update_data_barang&id_barang=<?php echo $data_barang['id_barang']; ?>">
                                  <button type="submit" name="edit_barang" class="btn btn-sm btn-primary btn-custom">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-pen"></i>
                                    </span>
                                  </button>
                                </a>
                                <a href="?p=hapus_data_barang&id_barang=<?php echo $data_barang['id_barang']; ?>">
                                  <button name="hapus_data_barang" class="btn btn-sm btn-danger btn-custom "  onClick="return confirm('Yakin Akan Menghapus Data?');">
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

    <hr class ="sidebar-diver"></hr>
      <!-- data tabel -->
    <div class="col">
        <div class="row justify-content-satart">
            <div class="col-md-push-5 col">
                  <div class="card shadow border-left-dark">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold">Data Jenis Barang</h6>
                    </div>
                    <div class="card-body" >
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped" id="dataJenisBarang" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Id jenis</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if ($jenis_barang->tampil_jns_barang() != False) {
                            $no =1;
                            foreach($jenis_barang->tampil_jns_barang() as $jns_brng){
                            ?>
                            <tr>
                              <td><?php echo $jns_brng['id_jenis_barang'] ;?></td>
                              <td><?php echo $jns_brng['keterangan_jenis_barang'] ;?></td>
                              <td>
                                <a href="?p=update_data_barang&jns_br=<?php echo $jns_brng['id_jenis_barang'] ;?>">
                                  <button type="submit" name="edit_barang" class="btn btn-sm btn-primary btn-custom">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-pen"></i>
                                    </span>
                                  </button>
                                </a>
                                <a href="?p=hapus_data_barang&jns_br=<?php echo $jns_brng['id_jenis_barang'] ;?>">
                                  <button name="hapus_jenis_barang" class="btn btn-sm btn-danger btn-custom "  onClick="return confirm('Yakin Akan Menghapus Data?');">
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
            <div class="col-md-pull-4 col">
              <div class="card shadow  border-left-dark">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold">Data Satuan Barang</h6>
                </div>
                <div class="card-body" >
                <div class="table-responsive">
                  <table class="table table-bordered table-striped" id="dataJenisSatuan" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Id Satuan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($satuan_barang->tampil_satuan_barang() != False) {
                            $no =1;
                            foreach($satuan_barang->tampil_satuan_barang() as $jns_satuan){
                            ?>
                            <tr>
                              <td><?php echo $jns_satuan['id_satuan_barang'] ;?></td>
                              <td><?php echo $jns_satuan['keterangan_satuan_barang'] ;?></td>
                              <td>
                                <a href="?p=update_data_barang&sat_br=<?php echo $jns_satuan['id_satuan_barang'] ;?>">
                                  <button type="submit" name="edit_barang" class="btn btn-sm btn-primary btn-custom">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-pen"></i>
                                    </span>
                                  </button>
                                </a>
                                <a href="?p=hapus_data_barang&sat_br=<?php echo $jns_satuan['id_satuan_barang'] ;?>">
                                  <button name="hapus_satuan_barang" class="btn btn-sm btn-danger btn-custom "  onClick="return confirm('Yakin Akan Menghapus Data?');">
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

    <hr class ="sidebar-diver"></hr>
