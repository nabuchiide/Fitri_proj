<?php

// include_once "class/Koneksi.php";
include_once "PHPExcel.php";


// $db = new Koneksi();
// $db->koneksi_mysql(); //koneksi database



// Panggil class PHPExcel nya
$excel = new PHPExcel();
// Settingan awal file excel
$excel->getProperties()->setCreator('projek-ta')
         ->setLastModifiedBy('')
         ->setTitle("LAPORAN STOK ATK")
         ->setSubject("laporan")
         ->setDescription("LAPORAN STOK ATK")
         ->setKeywords("Laporan STOK ATK");
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
//Set header
$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN STOK ATK");

$excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai M1
$excel->getActiveSheet()->mergeCells('A2:M2'); // Set Merge Cell pada kolom A1 sampai M1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(25); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO.");
$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID BARANG");
$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA BARANG");
$excel->setActiveSheetIndex(0)->setCellValue('D3', "STOK");
$excel->setActiveSheetIndex(0)->setCellValue('E3', "SATUAN");


// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);


// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(30);

    
// $sql = mysql_query(" SELECT * FROM atk ");

// $no = 0;
// $numrow = 3;
// while ($row = mysql_fetch_array($sql)) {
    

//     $no++;
//     $numrow++;
//     $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
//     $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row['id_barang']);
//     $excel->setActiveSheetIndex(0)->setCellValueExplicit('C'.$numrow, $row['nama_barang'], PHPExcel_Cell_DataType::TYPE_STRING);
//     $excel->setActiveSheetIndex(0)->setCellValueExplicit('D'.$numrow, $row['stok'], PHPExcel_Cell_DataType::TYPE_STRING);
//     $excel->setActiveSheetIndex(0)->setCellValueExplicit('E'.$numrow, $row['satuan'], PHPExcel_Cell_DataType::TYPE_STRING);

//     // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
//     $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
//     $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
//     $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
//     $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
//     $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
 
//     $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
//  }   

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(23); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(13); // Set width kolom D
// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Stok Atk");
$excel->setActiveSheetIndex(0);
// Proses file excel
// $objWriter = new PHPExcel_Writer_Excel2007($excel); 
$now = date('d-m-Y  h:i:s');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=laporan stok atk $now.xls"); // Set nama file excel nya
header('Cache-Control: max-age=0');
$write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
// $write = PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
$write->save('php://output');
exit;

?>