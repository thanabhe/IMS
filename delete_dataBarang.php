<?php
//HAPUS
include 'connect.php';

$id     = $_GET['id'];
$result = $mysqli->query("DELETE FROM tblbarang WHERE matnr = '$id'"); 	
if ($result){ ?>
    <script language="javascript">
            alert('Berhasil Dihapus');
        document.location.href="data_barang.php";
    </script>
<?php
}else {
        trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
}
?>