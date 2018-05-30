<?php 

	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$id = $_GET['id'];
	$change = $_SESSION['nama'];
	$date_change = date("Y-m-d H:i:s");

	$sql = "UPDATE user SET username = '$username', nama = '$nama', email = '$email' , level = '$level', last_change = '$change', date_last_change = '$date_change' WHERE username = '$id' ";
	if( $mysqli->query($sql) ) {
		echo "<script>alert('Data Berhasil disimpan');
			document.location.href = 'data_user.php'</script>";
	}else{
		echo "<script>alert('Data Gagal disimpan');
		document.location.href = 'edit_dataUser.php'</script>";
	}
	$mysqli->close();
?>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>