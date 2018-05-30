<?php 
	
	include 'connect.php';


    $id=$_GET['id'];

	$del=$mysqli->query("delete from tblsementara where id='$id'");

	if($del) {
		header("location:input_penerimaan.php");
	}else{
		echo "<script>alert('Data Gagal disimpan');
		document.location.href = 'input_penerimaan.php'</script>";
	}
	$mysqli->close();
?>