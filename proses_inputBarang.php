<?php 

	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$kd_brg = $_POST['kd_brg'];
	$barang = $_POST['nm_brg'];
	$qty = $_POST['qty'];
	$create_by = $_SESSION['nama'];
	$date_create = date("Y-m-d H:i:s");

	$sql = "INSERT into tblbarang (matnr,nama_brg,stock,created_by,date_create) values ('$kd_brg','$barang','$qty','$create_by','$date_create')";
	if( $mysqli->query($sql) ) {
		echo "<script>alert('Data Berhasil disimpan');
		document.location.href = 'data_barang.php'</script>";
	}else{
		echo "<script>alert('Data Gagal disimpan');
		document.location.href = 'input_barang.php'</script>";
	}
	$mysqli->close();
?>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>