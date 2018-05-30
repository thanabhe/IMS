<?php 

	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$pass = md5($_POST['pass']);
	$email = $_POST['email'];
	$level = $_POST['level'];
	$create_by = $_SESSION['nama'];
	$date_create = date("Y-m-d H:i:s");

	$sql = "INSERT into user (username,nama,password,email,level,created_by,date_created) values ('$username','$nama','$pass','$email','$level','$create_by','$date_create')";
	if( $mysqli->query($sql) ) {
		echo "<script>alert('Data Berhasil disimpan');
		document.location.href = 'data_user.php'</script>";
	}else{
		echo "<script>alert('Data Gagal disimpan');
		document.location.href = 'input_user.php'</script>";
	}
	$mysqli->close();
?>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>