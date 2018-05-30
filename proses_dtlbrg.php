<?php 

session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';
	include "vendors/phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA

$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
    mkdir($tempdir);

	
    $code = $_POST['code'];
	$nama_brg = $_POST['nama_brg'];
	$merk = $_POST['merk'];
	$sn = $_POST['sn'];
	$status = $_POST['status'];
	$lokasi = $_POST['lokasi'];
	$create_by = $_SESSION['nama'];
	$date_create = date("Y-m-d H:i:s");

	#parameter inputan
	$isi_teks = $code;
	$namafile = "$code.png";
	$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
	$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
	$padding = 0;
	 
	QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);


	$sql = "INSERT into detailbarang (barcode,matnr,merk,sn,status,lokasi,files,create_by,date_create) values ('$code','$nama_brg','$merk','$sn','$status','$lokasi','$namafile','$create_by','$date_create')";
	if( $mysqli->query($sql) ) {
		echo "<script>alert('Data Berhasil disimpan');
		document.location.href = 'detail_barang.php'</script>";
	}else{
		echo "<script>alert('Data Gagal disimpan');
		document.location.href = 'input_dtlbrg.php'</script>";
	}
	$mysqli->close();
?>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>