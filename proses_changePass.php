<?php 

	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$user = $_SESSION['username'];
	$old = md5($_POST['old_pass']);
	$new = md5($_POST['new_pass']);
	$conf= md5($_POST['conf_pass']);

	$date_change = date("Y-m-d H:i:s");

	$cek = $mysqli->query("SELECT * from user where username = '$user'");
	$data = $cek->fetch_array();

		if ($old == $data['password']) {
		$sql = $mysqli->query("UPDATE user SET password = '$new' where username = '$user'");
			if ($sql) {
				echo "<script>alert('Change Password Success');
				document.location.href = 'index.php'</script>";
			}else{
				echo "<script>alert('Change Password Failed');
				document.location.href = 'change_password.php'</script>";
			}
		}else{
				echo "<script>alert('Wrong Old Password');
				document.location.href = 'change_password.php'</script>";
				session_destroy(); // menghancurkan session
		}
?>

<?php
    }else{
     header("location:login.php");
      die();
    }
    
?>