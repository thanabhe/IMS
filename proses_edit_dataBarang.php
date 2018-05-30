<?php 

	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$id = $_GET['id'];
	$kd_brg = $_POST['kd_brg'];
	$barang = $_POST['nm_brg'];
	$qty = $_POST['qty'];
	$change = $_SESSION['nama'];
	$date_change = date("Y-m-d H:i:s");

	$sql = "UPDATE tblbarang SET matnr = '$kd_brg', nama_brg = '$barang', stock = '$qty' , last_change = '$change', date_last_change = '$date_change' WHERE matnr = '$id' ";
	if( $mysqli->query($sql) ) {
		echo "<script>alert('Data Berhasil disimpan');
		document.location.href = 'data_barang.php'</script>";
	}else{
		echo "<script>alert('Data Gagal disimpan');
		document.location.href = 'edit_dataBarang.php'</script>";
	}
	$mysqli->close();
?>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>