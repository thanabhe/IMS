<?php 
	
	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$barang = $_POST['nama_brg'];
	$qty = $_POST['qty'];
	$sn = $_POST['sn'];
	$notes = $_POST['notes'];
	$user = $_SESSION['username']; 

	$cek_stock = $mysqli->query("SELECT * FROM tblbarang WHERE matnr='$barang'") or die(mysql_error());
	$res_cek_stock = $cek_stock->fetch_array();
	$stock = $res_cek_stock['stock'];

	if ($stock<$qty) {
		echo " <script>
		alert('Maaf Stok Barang tidak mencukupi,  Mohon cek Stok Barang yang tersedia dan coba kembali');window.location.href='input_pengiriman.php';
		</script>";
	}else{
		$sql = $mysqli->query("SELECT * FROM user WHERE username='$user' AND password='$pass'") or die(mysql_error());
		if(mysqli_num_rows($sql) == 0){

		$sql = "INSERT into tblsementara (matnr,qty,sn,notes,username) values ('$barang','$qty','$sn','$notes','$user')";
		if( $mysqli->query($sql) ) {
			header("location:input_pengiriman.php");
		}else{
			echo "<script>alert('Data Gagal disimpan');
			document.location.href = 'input_pengiriman.php'</script>";
		}
		$mysqli->close();
	}

}

    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>