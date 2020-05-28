<!-- <?php 
    // class order{

    //     public function id_terakhir(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn, "SELECT max(`id_order`) FROM `order`");
    //         $row = mysqli_fetch_array($query);
    //         if ($row) {
    //             $nilai_Id = substr($row[0], 3);
    //             $id_order = (int) $nilai_Id;
    //             $id_order = $id_order + 1;
    //             $id_order_otomatis = "REQ" .str_pad($id_order, 3, "0", STR_PAD_LEFT);
    //         }else{
    //             $id_order_otomatis = "REQ001"; 
    //         }
    //         return $id_order_otomatis;
    //     }
    //     public function simpan($id_order, $tanggal, $total_transaksi, $nama_suplier, $status){
    //         $koneksi = new koneksi;
    //         $cek = mysqli_query($koneksi->conn,"SELECT * FROM `order` WHERE `id_order`= '$id_order'");
    //         if (mysqli_num_rows($cek)== 0) {
    //             $query = mysqli_query($koneksi->conn,"INSERT INTO `order`(`id_order`, `tanggal`, `total_transaksi`, `nama_suplier`, `status`) VALUES ('$id_order','$tanggal', '$total_transaksi','$nama_suplier','$status')");
    //             if ($query) {
    //                 // echo "<div class='alert alert-success'><span class='fa fa-check'> Data transaksi berhasil disimpan </span></div>";
    //             }
    //         }
    //     }
    //     public function edit($id_order, $tanggal, $total_transaksi, $nama_suplier){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal`='$tanggal',`total_transaksi`='$total_transaksi',`nama_suplier`=' $nama_suplier' WHERE `id_order`= '$id_order'");
    //         if ($query) {
    //             echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
    //         }
    //     }
    //     public function hapus($id_order){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"DELETE FROM `order` WHERE `id_order`= '$id_order'");
    //         if ($query) {
    //             echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil dihapus</div>";
    //         }
    //     }
    //     public function detil($id_order){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` WHERE `id_order`= '$id_order'");
    //         $row = mysqli_fetch_array($query);
            
    //         $this->id_order = $row['id_order'];
    //         $this->tanggal = $row['tanggal'];
    //         $this->status = $row['status'];
    //         $this->total_transaksi = $row['total_transaksi'];
    //         $this->nama_suplier = $row['nama_suplier'];
    //         $this->tanggal_penerimaan = $row['tanggal_penerimaan'];
    //         $this->tanggal_pembelian = $row['tanggal_pembelian'];
    //         $this->no_surat_jalan = $row['no_surat_jalan'];
    //         $this->tanggal_pelunasan = $row['tanggal_pelunasan'];
    //     }
    //     public function tampil_detil_transaksi(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` join `detail_order` on  `order`.`id_order` = `detail_order`.`id_order`");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function tampil(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `order`");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function di_beli($id_order, $status){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `status`='$status' WHERE `id_order`= '$id_order'");
    //         if ($query) {
    //             // echo "<div class='alert alert-success'><span class='fa fa-check'></span>Data telah di setujui</div>";
    //         }
    //     }
    //     public function pesanan($status){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`='$status'");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function tampil_status($status, $status1){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`='$status' OR `status`='$status1'");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function edit_total_transaksi($id_order, $total_transaksi){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `total_transaksi`= $total_transaksi WHERE `id_order`= '$id_order'");
    //         if ($query) {
    //             // echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data berhasil diperbarui</div>";
    //         }
    //     }
    //     public function edit_total_transaksi_retur($id_order, $total_transaksi){
    //         $koneksi = new koneksi;
    //         $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `order` WHERE `id_order`= '$id_order'");
    //         while ($row = mysqli_fetch_array($query0)) {  $total_transaksi_sekarang = $row['total_transaksi'];}
    //         $update_total_transaksi = $total_transaksi_sekarang - $total_transaksi;
    //         $query = mysqli_query($koneksi->conn, "UPDATE `order` SET `total_transaksi`= '$update_total_transaksi' WHERE `id_order`= '$id_order'");
    //     }
    //     public function edit_total_transaksi_retur_masuk($id_order, $total_transaksi){
    //         $koneksi = new koneksi;
    //         $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `order` WHERE `id_order`= '$id_order'");
    //         while ($row = mysqli_fetch_array($query0)) {  $total_transaksi_sekarang = $row['total_transaksi'];}
    //         $update_total_transaksi = $total_transaksi_sekarang + $total_transaksi;
    //         $query = mysqli_query($koneksi->conn, "UPDATE `order` SET `total_transaksi`= '$update_total_transaksi' WHERE `id_order`= '$id_order'");
    //     }
    //     public function edit_penerimaan_barang($id_order, $tanggal_penerimaan, $no_surat_jalan){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal_penerimaan`=' $tanggal_penerimaan', `no_surat_jalan` = '$no_surat_jalan' WHERE `id_order`= '$id_order'");
    //     }
    //     public function edit_tanggal_pembelian_barang($id_order, $tanggal_pembelian){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal_pembelian` = '$tanggal_pembelian' WHERE `id_order`= '$id_order'");
    //         if ($query) {
    //             echo "<div class='alert alert-success'><span class='fa fa-check'></span>Data telah di setujui</div>";
    //         }
    //     }
    //     public function edit_tanggal_pelunasan($id_order, $tanggal_pelunasan){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `order` SET `tanggal_pelunasan` = '$tanggal_pelunasan' WHERE `id_order`= '$id_order'");
    //     }
    //     public function tampil_selain($status){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `order` where `status`<>'$status'");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    // }

    // class cart{

    //     public function simpan($nama_barang, $harga_transaksi, $id_order, $jumlah){
    //         $koneksi = new koneksi;
    //             $query = mysqli_query($koneksi->conn,"INSERT INTO `detail_order`(`nama_barang`, `harga_transaksi`, `id_order`, `jumlah`) VALUES ('$nama_barang','$harga_transaksi','$id_order', $jumlah)");
    //             if ($query) {
    //                 // echo "<div class='alert alert-success'><span class='fa fa-check'> Data transaksi berhasil disimpan</span></div>";
    //         }
    //     }
    //     public function edit($detil_cart_id, $nama_barang, $harga_transaksi, $id_order, $jumlah){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `detail_order` SET `detil_cart_id`='$detil_cart_id',`nama_barang`='$nama_barang',`harga_transaksi`='$harga_transaksi', `id_order`= '$id_order', `jumlah` = '$jumlah' WHERE `detail_order`='$detil_cart_id'");
    //         if ($query) {
    //             echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
    //         }
    //     }
    //     public function edt_jml($detil_cart_id, $jumlah){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `detail_order` SET `jumlah`= $jumlah WHERE `detil_cart_id` = $detil_cart_id");
    //         if ($query) {
    //             echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
    //         }
    //     }
    //     public function hapus($detil_cart_id){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"DELETE FROM `detail_order` WHERE `detil_cart_id` = $detil_cart_id");
    //         if ($query) {
    //             echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil dihapus</div>";
    //         }
    //     }
    //     public function detail($detil_cart_id){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `id_order` = $detil_cart_id");
    //         $row = $query->fetch_assoc();
            
    //         $this->id_transaksi_detail = $row['detil_cart_id'];
    //         $this->nama_barang = $row['nama_barang'];
    //         $this->harga_transaksi = $row['harga_transaksi'];
    //         $this->id_order = $row['id_order'];
    //     }
    //     public function tampil_order($id_order){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `id_order` = '$id_order'");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function tampil_detail_order($detil_cart_id){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `detil_cart_id` = $detil_cart_id");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function edit_jumlah_ret($detil_cart_id,  $jumlah){
    //         $koneksi = new koneksi;
    //         $query0 = mysqli_query($koneksi->conn,"SELECT * FROM `detail_order` WHERE `detil_cart_id`= '$detil_cart_id'");
    //         while ($row = mysqli_fetch_array($query0)) {  $jumlah_awal = $row['jumlah'];}
    //         $update_jumlah = $jumlah_awal - $jumlah;
    //         $query = mysqli_query($koneksi->conn, "UPDATE `detail_order` SET `jumlah`= '$update_jumlah' WHERE `detil_cart_id`= '$detil_cart_id'");
    //     }
    // }

    // class retur{
    //     // $id_retur, $status, $total_transaksi, $tanggal, $id_order
    //     public function id_terakhir(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn, "SELECT max(`id_retur`) FROM `retur`");
    //         $row = mysqli_fetch_array($query);
    //         if ($row) {
    //             $nilai_Id = substr($row[0], 3);
    //             $id_ret = (int) $nilai_Id;
    //             $id_ret = $id_ret + 1;
    //             $id_ret_otomatis = "RET" .str_pad($id_ret, 3, "0", STR_PAD_LEFT);
    //         }else{
    //             $id_ret_otomatis = "RET001"; 
    //         }
    //         return $id_ret_otomatis;
    //     }
    //     public function simpan($id_retur, $status, $total_transaksi, $tanggal, $id_order){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"INSERT INTO `retur`(`id_retur`, `status`, `total_transaksi`, `tanggal`, `id_order`) VALUES ('$id_retur', '$status', '$total_transaksi', '$tanggal', '$id_order')");
    //     }
    //     public function tampil_detail_retur(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn, "SELECT `retur`.`id_retur`, `status`, `total_transaksi`, `tanggal`, `id_order`, `detil_ret_id`, `nama_barang`, `harga_transaksi`, `detail_retur`.`id_retur`, `jumlah`FROM `retur` join `detail_retur` on `retur`.`id_retur` = `detail_retur`.`id_retur`");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function tampil_join_order(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT id_retur, retur.status, retur.total_transaksi, retur.tanggal, order.nama_suplier, retur.id_order FROM `retur` join `order` on `retur`.`id_order` = `order`.`id_order`");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function edit($id_retur, $status, $total_transaksi, $tanggal, $id_order){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"UPDATE `retur` SET `status`='$status',`total_transaksi`='$total_transaksi',`tanggal`='$tanggal',`id_order`='$id_order' WHERE `id_retur`='$id_retur'");
    //         if ($query) {
    //             echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data transaksi berhasil diperbarui</div>";
    //         }
    //     }
    //     public function tampil(){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `retur`");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function detail($id_retur){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `retur` WHERE `id_retur`= '$id_retur'");
    //         $row = mysqli_fetch_array($query);
            
    //         $this->id_retur = $row['id_retur'];
    //         $this->id_order = $row['id_order'];
    //         $this->tanggal = $row['tanggal'];
    //         $this->status = $row['status'];
    //         $this->total_transaksi = $row['total_transaksi'];
    //     }
    // }

    
    // class retur_detail{
    //     public function simpan($nama_barang, $harga_transaksi, $id_retur, $jumlah){
    //         $koneksi = new koneksi;
    //             $query = mysqli_query($koneksi->conn,"INSERT INTO `detail_retur`(`nama_barang`, `harga_transaksi`, `id_retur`, `jumlah`) VALUES ('$nama_barang', '$harga_transaksi', '$id_retur', '$jumlah')");
    //     }
    //     public function tampil_retur_detail($id_retur){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_reutur` WHERE `id_retur`='$id_retur'");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    //     public function tampil_retur($id_retur){
    //         $koneksi = new koneksi;
    //         $query = mysqli_query($koneksi->conn,"SELECT * FROM `detail_retur` WHERE `id_retur` = '$id_retur'");
    //         if (mysqli_num_rows($query)>0) {
    //             while ($row= mysqli_fetch_array($query)) {
    //                 $data[]= $row;
    //             }
    //             return $data;
    //         }
    //     }
    // }
    ?> -->