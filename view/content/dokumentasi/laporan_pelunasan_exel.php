<?php 
    include_once '../../../control/koneksi.php';
    include_once "PHPExcel.php";

	// Panggil class PHPExcel nya
$excel = new PHPExcel();
// Settingan awal file excel
$excel->getProperties()->setCreator('projek-ta')
         ->setLastModifiedBy('')
         ->setTitle("LAPORAN PELUNASAN")
         ->setSubject("laporan")
         ->setDescription("LAPORAN PELUNASAN")
         ->setKeywords("LAPORAN PELUNASAN");
//Style kolom
$style_col = array(
    'font' => array('bold' => true), // Set font nya jadi bold
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
    'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
);
//Style row
$style_row = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
    'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
);
	//set header
	$excel -> setActiveSheetIndex(0)->setCellValue('D2', "PT HAS PUTRA HARAPAN");
	$excel -> setActiveSheetIndex(0)->setCellValue('D4', "Jalan Rm Soleh No, 38 Kelurahan Nagasari");
	$excel -> setActiveSheetIndex(0)->setCellValue('D5', "Kecamatan Karawang Barat Kabupaten Karawang 41361");
	$excel -> setActiveSheetIndex(0)->setCellValue('D6', "Telepon & Fax (0267) 845150");
	$excel -> setActiveSheetIndex(0)->setCellValue('B7', "________________________________________________________________________________________________________________________________________________________________________________________________");
	$excel -> setActiveSheetIndex(0)->setCellValue('B8', "________________________________________________________________________________________________________________________________________________________________________________________________");
	$excel -> setActiveSheetIndex(0)->setCellValue('E10', "LAPORAN PELUNASAN");

	// Set Merge Cell pada kolom 
	$excel->getActiveSheet()->mergeCells('D2:I2'); 
	$excel->getActiveSheet()->mergeCells('D4:I4');
	$excel->getActiveSheet()->mergeCells('D5:I5');
	$excel->getActiveSheet()->mergeCells('D6:I6');
	$excel->getActiveSheet()->mergeCells('B7:J7');
	$excel->getActiveSheet()->mergeCells('B8:J8');
	$excel->getActiveSheet()->mergeCells('E10:H10');

	$excel->getActiveSheet()->getStyle('D2')->getFont()->setBold(TRUE);
	$excel->getActiveSheet()->getStyle('D2')->getFont()->setsize(26);
	$excel->getActiveSheet()->getStyle('D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$excel->getActiveSheet()->getStyle('D4')->getFont()->setBold(FALSE);
	$excel->getActiveSheet()->getStyle('D4')->getFont()->setsize(12);
	$excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$excel->getActiveSheet()->getStyle('D5')->getFont()->setBold(FALSE);
	$excel->getActiveSheet()->getStyle('D5')->getFont()->setsize(12);
	$excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$excel->getActiveSheet()->getStyle('D6')->getFont()->setBold(False);
	$excel->getActiveSheet()->getStyle('D6')->getFont()->setsize(12);
	$excel->getActiveSheet()->getStyle('D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$excel->getActiveSheet()->getStyle('E10')->getFont()->setBold(False);
	$excel->getActiveSheet()->getStyle('E10')->getFont()->setsize(18);
	$excel->getActiveSheet()->getStyle('E10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//Buat header table nya pada baris ke 12
	$excel->setActiveSheetIndex(0)->setCellValue('C12', "NO.");
	$excel->setActiveSheetIndex(0)->setCellValue('D12', "No Surat Jalan");
	$excel->setActiveSheetIndex(0)->setCellValue('E12', "NAMA SUPLIER");
	$excel->setActiveSheetIndex(0)->setCellValue('F12', "TANGGAL PELUNASAN");
	$excel->setActiveSheetIndex(0)->setCellValue('G12', "TOTAL HUTANG");
	$excel->setActiveSheetIndex(0)->setCellValue('H12', "STATUS");
	$excel->setActiveSheetIndex(0)->setCellValue('I12', "KETERANGAN");

	//Apply Sytel Header yang telah di buat sebelumnya ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('C12')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('D12')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('E12')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('F12')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('G12')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('H12')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('I12')->applyFromArray($style_col);
	// Set height baris ke 1, 2 dan 3
	// $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
	// $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
	// $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(30);
            $koneksi = new koneksi;
            $query = mysqli_query($koneksi->conn,"SELECT `id_pembayaran`,`tanggal`,`tanggal_penerimaan`, `tanggal_pelunasan`, `tanggal_pembelian`, `no_surat_jalan`, `nama_suplier`, `order`.`status`, `pembayaran`.`status`,`total_transaksi`, `tempo` as `akhir pembayaran` from `pembayaran` join `order` on `pembayaran`.`id_order` = `order`.`id_order`");
            $no = 0;
            $numrow = 12;
            $msg = "Proses Pelunasan"; 
            while ($key= mysqli_fetch_array($query)) {
                $no++;
                $numrow++;
                if ($key['status'] == "Belum Lunas"){
                    $date = strtotime(date('Y-m-d', strtotime($key['tanggal_penerimaan']))); 
                    $Today= strtotime(date('Y-m-d'));
                    $beda_hari = $Today - $date;
                    $tempo_jth = floor($beda_hari/(60*60*24));
                    $rentang_waktu = $key['akhir pembayaran'];
                    $msg = "Proses Pelunasan";
                        if ($tempo_jth >= $rentang_waktu) {
                            $a = "Jatuh Tempo";
                            $bnyk_jth++;
                        }else {
                            if  ($rentang_waktu - $tempo_jth == 1) {
                                $a = "Jatuh Tempo Besok";
                            }elseif ($rentang_waktu - $tempo_jth == 2) {
                                $a = "2 Hari Lagi Jatuh Tempo";
                            }elseif ($rentang_waktu - $tempo_jth == 3) {
                                $a = "3 Hari Lagi Jatuh Tempo";
                            }else {
                                $a = "Belum Jatuh Tempo";
                            }
                        }
                }else {
                    $a = "Sudah Lunas";
                    $msg = date("d/m/Y", strtotime($key['tanggal_pelunasan']));
                    
                }

                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $key['no_surat_jalan']);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('E'.$numrow, $key['nama_suplier'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('F'.$numrow, $msg, PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('G'.$numrow, $key['total_transaksi'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('H'.$numrow, $key['status'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('I'.$numrow, $a, PHPExcel_Cell_DataType::TYPE_STRING);
                
                $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);

                $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
            }
            $menget = $numrow+=3;
            $Kepala = $numrow+=3;
            $isiKepala = $numrow+=4;
            $excel -> setActiveSheetIndex(0)->setCellValue('G'.$menget, "Mengetahui");
            $excel -> setActiveSheetIndex(0)->setCellValue('F'.$Kepala, "Accounting");
            $excel -> setActiveSheetIndex(0)->setCellValue('H'.$Kepala, "Pimpinan");
            $excel -> setActiveSheetIndex(0)->setCellValue('F'.$isiKepala, "Ahmad Denejad");
            $excel -> setActiveSheetIndex(0)->setCellValue('H'.$isiKepala, "Nizar Sungkar");

            $excel->getActiveSheet()->getStyle('F'.$Kepala)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $excel->getActiveSheet()->getStyle('H'.$Kepala)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
            $excel->getActiveSheet()->getStyle('F'.$isiKepala)->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('F'.$isiKepala)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $excel->getActiveSheet()->getStyle('H'.$isiKepala)->getFont()->setBold(True);
            $excel->getActiveSheet()->getStyle('H'.$isiKepala)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    // Set width kolom

            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(2); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(2); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(5); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(23); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('K')->setWidth(2); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('L')->setWidth(2); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('M')->setWidth(2); // Set width kolom D
			// Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("LAPORAN PELUNASAN");
            $excel->setActiveSheetIndex(0);
            // Proses file excel
            // $objWriter = new PHPExcel_Writer_Excel2007($excel); 
            $now = date('d-m-Y  h:i:s');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment; filename=LAPORAN PELUNASAN $now.xls"); // Set nama file excel nya
            header('Cache-Control: max-age=0');
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            // $write = PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $write->save('php://output');
            exit;
	?>
