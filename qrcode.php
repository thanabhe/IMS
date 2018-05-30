<?php
include "vendors/phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA
 
$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
    mkdir($tempdir);
 
$isi = "SN : 129832943
Store : Jember
Tgl Terima : 19-09-2017
PO : 920832832
Open Store : 09-10-2017";

#parameter inputan
$isi_teks = $isi;
$namafile = "coba.png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
$padding = 0;
 
QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

?>

<img src="temp/coba.png">