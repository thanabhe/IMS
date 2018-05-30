<?php

include 'connect.php';

$mysql_hostname = 'localhost';
  $mysql_username = 'root';      
  $mysql_password = '';      
  $mysql_dbname = 'ttusk';  
 
  $mysqli = new mysqli ($mysql_hostname, $mysql_username, $mysql_password, $mysql_dbname);

$date = date('dmY');
 
include "vendors/PHPexcel/Classes/PHPExcel.php";
include "vendors/fungsi_indotgl.php";

 
$excel = new PHPExcel;
 
$excel->getProperties()->setCreator("MAXXIMS");
$excel->getProperties()->setLastModifiedBy("MAXXIMS");
$excel->getProperties()->setTitle("Data Barang");
$excel->removeSheetByIndex(0);
 
 
$sheet = $excel->createSheet();
$sheet->setTitle('sheet_1');
 $sheet->setCellValue("A1", "No");
 $sheet->setCellValue("B1", "Nama Barang");
 $sheet->setCellValue("C1", "Stock");
 

$no = 1;
$cari = $mysqli->query("SELECT * from tblbarang ORDER BY nama_brg asc");

$i = 2; //Dimulai dengan baris ke dua, baris pertama digunakan oleh titel kolom
while( $r = $cari->fetch_array() ){
   $sheet->setCellValue( "A" . $i, $no );
   $sheet->setCellValue( "B" . $i, $r['nama_brg'] );
   $sheet->setCellValue( "C" . $i, $r['stock'] );
   $i++;
   $no++;
}
 $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
 $writer->save("files/Data Barang-$date.xlsx");
 
?>
Your File in : <a href="<?php echo "files/Data Barang-$date";?>.xlsx"><button>Here</button></a>
 