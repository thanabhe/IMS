<?php 
	
	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$barang = $_POST['nama_brg'];
	$qty = $_POST['qty'];
	$sn = $_POST['sn'];
	$notes = $_POST['notes'];

	$sql = "INSERT into tblsementara (matnr,qty,sn,notes) values ('$barang','$qty','$sn','$notes')";
	if( $mysqli->query($sql) ) {
		header("location:input_penerimaan.php");
	}else{
		echo "<script>alert('Data Gagal disimpan');
		document.location.href = 'input_penerimaan.php'</script>";
	}
	$mysqli->close();
?>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>