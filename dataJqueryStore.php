<?php
session_start();

include_once 'connect.php';

//harus selalu gunakan variabel term saat memakai autocomplete,
//jika variable term tidak bisa, gunakan variabel q
$term = trim(strip_tags($_GET['term']));
  
$qstring = "SELECT * FROM tblstore WHERE nama_store LIKE '".$term."%'";
//query database untuk mengecek tabel anime
$result = $mysqli->query($qstring);
  
while ($row = $result->fetch_array())
{
    $row['value']=htmlentities(stripslashes($row['nama_store']));
    $row['id']=(int)$row['nama_store'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>