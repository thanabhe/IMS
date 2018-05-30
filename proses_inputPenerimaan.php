 <?php 
	session_start();
	if (isset($_SESSION['username'])) {
	include 'connect.php';

	$no_surat = $_POST['no_surat'];
	$pengirim = $_POST['pengirim'];
	$alamat = $_POST['alamat'];
	$jenis = $_POST['jenis'];
	$tgl_kirim = $_POST['tgl_kirim'];
	$username = $_SESSION['username'];
	$date_create = date("Y-m-d H:i:s");
	$penerima = $_SESSION['nama'];
	

	$sql = "INSERT into tblpengiriman (no_surat,penerima,almt_penerima,pengirim,jenis,tgl_kirim,username,status,date_create) values ('$no_surat','$penerima','$alamat','$pengirim','jenis','$tgl_kirim','$username','received','$date_create')";
	if( $mysqli->query($sql) ) {
		$query = $mysqli->query ("SELECT * FROM tblsementara");
		while ($r = $query->fetch_row()) {
			$mysqli->query("INSERT into detailpenerimaan (no_surat,matnr,qty,sn,notes) VALUES ('$no_surat','$r[1]','$r[2]','$r[3]','$r[4]')");
		}

		//hapus seluruh isi tabel sementara
        $mysqli->query("TRUNCATE table tblsementara");

		header("location:barang_masuk.php");
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