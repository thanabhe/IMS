<?php
session_start();
include'connect.php';

	$user = $mysqli->real_escape_string(htmlentities($_POST['username']));
	$pass = $mysqli->real_escape_string(htmlentities(md5($_POST['password'])));
 
	$sql = $mysqli->query("SELECT * FROM user WHERE username='$user' AND password='$pass'") or die(mysql_error());
	if(mysqli_num_rows($sql) == 0){
		echo '<script language="javascript">alert("User dan Password Salah!"); document.location="login.php";</script>';
	}else{
		$row = $sql->fetch_assoc();
		if($row['level'] == 'admin' || $row['level'] == 'Admin'){
			$_SESSION['username']=$row['username'];
			$_SESSION['hak_akses']=$row['level'];
			$_SESSION['nama']=$row['nama'];
			$_SESSION['email']=$row['email'];
			header("location:index.php");
		}elseif ($row['level'] == 'staff' || $row['level'] == 'Staff'){
			$_SESSION['username']=$row['username'];
			$_SESSION['hak_akses']=$row['level'];
			$_SESSION['nama']=$row['nama'];
			$_SESSION['email']=$row['email'];
			header("location:index.php");
		}
	}
?>